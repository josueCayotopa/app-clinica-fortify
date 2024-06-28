<?php

namespace App\Http\Controllers;

use App\Http\Requests\RolCreateRequest;
use App\Http\Requests\RolEditRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolController extends Controller
{
   public  function index(Request $request)
   {
      abort_if( Gate::denies('role_index'), 403);
      $query = Role::query();

      if ($request->has('search')) {
          $search = $request->input('search');
          $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('id', 'LIKE', "%{$search}%");
      }
  
      $roles = $query->paginate(5);
      if ($request->ajax()) {
        return response()->json([
            'view' => view('users.roles.index', compact('roles'))->render(),
            'url' => route('roles.index', $request->query())
        ]);}
    

    return view('home')->with([
        'view' => 'users.roles.index',
        'data' => compact('roles'),
    ]);
     
   }
   public  function create(Request $request)
   {
      abort_if( Gate::denies('role_create'), 403);
      $permissions=Permission::all()->pluck('name', 'id');
     
      if ($request->ajax()) {
        return response()->json([
            'view' => view('users.roles.create', compact('permissions'))->render(),
            'url' => route('roles.create', $request->query())
        ]);
       
     }

     return view('home')->with([
         'view' => 'users.roles.create',
         'data' => compact('permissions'),
     ]);

    
   }
   public  function store(RolCreateRequest $request)
   {


    $role=Role::create($request->validated());
    // 
    $role->permissions()->sync($request->input('permissions',[]));

    return redirect()->route('roles.index')->with('success', 'Rol creado correctamente');
    
   }
   public  function show(Role $role, Request $request)
   {
      abort_if( Gate::denies('role_show'), 403);
    $role->load('permissions');
   
    if ($request->ajax()) {
        return response()->json([
            'view' => view('users.roles.show', compact('role'))->render(),
            'url' => route('roles.show', $request->query())
        ]);
    
  }

  return view('home')->with([
      'view' => 'users.roles.show',
      'data' => compact('role'),
  ]);
    
   }

   public  function edit(Role $role, Request $request)
   {
      abort_if( Gate::denies('role_edit'), 403);
      $permissions=Permission::all()->pluck('name','id');
      $role->load('permissions');

      
      if ($request->ajax()) {
        return response()->json([
            'view' => view('users.roles.edit', compact('role', 'permissions'))->render(),
            'url' => route('roles.edit', $request->query())
        ]);
     }
   
     return view('home')->with([
         'view' => 'users.roles.edit',
         'data' => compact('role','permissions'),
     ]);
   }
   public  function update(RolEditRequest $request,$id)
   {
      

    $roleid = Role::findOrFail($id);
    $role= $request->only('name');
    $roleid->update($role);
    $roleid->permissions()->sync($request->input('permissions',[]));

    return redirect()->route('roles.index')->with('success', 'Rol  actualizado conrrectamente');
    


   }
   public  function destroy(Role $role)
   {
      abort_if( Gate::denies('role_destroy'), 403);

    $role->delete();
    return redirect()->route('roles.index')->with('danger', 'Rol  eliminado conrrectamente');;      
    
   }
}
