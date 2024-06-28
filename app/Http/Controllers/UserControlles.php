<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\User;
use com_exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;
use Symfony\Component\Routing\Matcher\RedirectableUrlMatcher;

class UserControlles extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('user_index'), 403);
        $users = User::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $users->where('username', 'like', "%$search%");
        }

        $users = $users->paginate(5);
        if ($request->ajax()) {
            return response()->json([
                'view' => view('users.index', compact('users'))->render(),
                'url' => route('users.index', $request->query())
            ]);}
        return view('home')->with([
            'view' => 'users.index',
            'data' => compact('users'),
        ]);
    }

    public function create(Request $request)
    {
        abort_if(Gate::denies('user_create'), 403);
        $roles = Role::all()->pluck('name', 'id');
        if ($request->ajax()) {
            return response()->json([
                'view' => view('users.create', compact('roles'))->render(),
                'url' => route('users.create', $request->query())
            ]);
        }
        return view('home')->with([
            'view' => 'users.create',
            'data' => compact('roles'),
        ]);
        
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Buscar usuarios que coincidan con el término de búsqueda
        $users = User::where('name', 'like', "%$query%")
            ->orWhere('username', 'like', "%$query%")
            ->limit(10)
            ->get();

        return response()->json($users);
    }

    public function store(UserCreateRequest $request)
    {
        $user = User::create($request->only('name', 'username', 'email')
            + [
                'password' => bcrypt($request->input('password')),
            ]);

        // Obtener los IDs de los roles del request
        $roleIds = $request->input('roles', []);

        // Convertir los IDs a nombres de roles
        $roles = Role::whereIn('id', $roleIds)->pluck('name')->toArray();

        // Asignar los roles al usuario
        $user->syncRoles($roles);

        if ($request->ajax()) {
            return response()->json(['success' => 'Usuario creado correctamente']);
        }

        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente');
    }

    public function show($user, Request $request)
    {
        abort_if(Gate::denies('user_show'), 403);

        $user = User::find($user);

        if ($request->ajax()) {
            return response()->json([
                'view' => view('users.show', compact('user'))->render(),
                'url' => route('users.show', $request->query())
            ]);
           
        }

        return view('home')->with([
            'view' => 'users.show',
            'data' => compact('user'),
        ]);
    }

    public function edit(User $user, Request $request)
    {
        abort_if(Gate::denies('user_edit'), 403);
        $roles = Role::all()->pluck('name', 'id');
        $user->load('roles');



        if ($request->ajax()) {
            return response()->json([
                'view' => view('users.edit', compact('user', 'roles'))->render(),
                'url' => route('users.edit', $request->query())
            ]); 
            
        }

        return view('home')->with([
            'view' => 'users.edit',
            'data' => compact('user', 'roles'),
        ]);
    }

    public function update(UserEditRequest $request, $id)
    {
        $usersid = User::findOrFail($id);
        $user = $request->only('name', 'username', 'email');
        $password = $request->input('password');

        if ($password) {
            $user['password'] = bcrypt($password);
        }

        $usersid->update($user);

        // Obtener los IDs de los roles del request
        $roleIds = $request->input('roles', []);

        // Convertir los IDs a nombres de roles
        $roles = Role::whereIn('id', $roleIds)->pluck('name')->toArray();

        // Asignar los roles al usuario
        $usersid->syncRoles($roles);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_destroy'), 403);

        if (auth()->user()->id == $user->id) {
            return redirect()->route('users.index');
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente');
    }

    public function countUsers(Request $request)
    {
        $userCount = User::count();

        return view('dashboard.index', compact('userCount'));
        if ($request->ajax()) {
            return response()->json([
                'view' => view('dashboard.index', compact('userCount'))->render(),
                'url' => route('home.dashboard', $request->query())
            ]); 
            
        }

        return view('home', compact('onlineUsers', 'usuarios'))->with('userCount');
    }
}
