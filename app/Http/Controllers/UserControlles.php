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
    public function create()
    {
        abort_if(Gate::denies('user_create'), 403);

        // le pasamos los roles 
        $roles = Role::all()->pluck('name', 'id');

        return view('users.create', compact('roles'));
    }
    public function index(Request $request)

    {
        abort_if(Gate::denies('user_index'), 403);
        $users = User::query();

        // Realizar la búsqueda si hay un parámetro 'search'
        if ($request->has('search')) {
            $search = $request->input('search');
            $users->where('username', 'like', "%$search%"); // Ajusta según el nombre real del campo en tu base de datos
        }

        $users = $users->paginate(10); // Ejemplo de paginación, ajusta según tus necesidades

        return view('users.index', compact('users'));
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

        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente');
    }

    public function show($user)
    {
        abort_if(Gate::denies('user_show'), 403);
        $user = User::find($user);
        return view('users.show', compact('user'));
    }
    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), 403);
        $roles = Role::all()->pluck('name', 'id');
        $user->load('roles');

        return view('users.edit', compact('user', 'roles'));
    }
    public function update(UserEditRequest $request, $id)
    {
        $usersid = User::findOrFail($id);
        $user = $request->only('name', 'username', 'email');
        $password = $request->input('password');
        if ($password)

            $user['password'] = bcrypt($password);


        $usersid->update($user);


        // Obtener los IDs de los roles del request
        $roleIds = $request->input('roles', []);

        // Convertir los IDs a nombres de roles
        $roles = Role::whereIn('id', $roleIds)->pluck('name')->toArray();

        // Asignar los roles al usuario
        $usersid->syncRoles($roles);
        return redirect()->route('users.index')->with('success', 'usuario actualizado conrrectamente');
    }



    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_destroy'), 403);
        if (auth()->user()->id = $user->id) {

            return redirect()->route('users.index');
        }

        $user->delete();
        return redirect()->route('users.index');
    }



    public function countUsers()
    {
        $userCount = User::count();

        return view('dashboard.index',compact('userCount'));
    }
}
