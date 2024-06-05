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
  
      return view('users.roles.index', compact('roles'));

   }
   public  function create()
   {
      abort_if( Gate::denies('role_create'), 403);
      $permissions=Permission::all()->pluck('name', 'id');
     
    
    return view('users.roles.create', compact('permissions'));
    
   }
   public  function store(RolCreateRequest $request)
   {


    $role=Role::create($request->validated());
    // 
    $role->permissions()->sync($request->input('permissions',[]));

    return redirect()->route('roles.index')->with('success', 'Rol creado correctamente');
    
   }
   public  function show(Role $role)
   {
      abort_if( Gate::denies('role_show'), 403);
    $role->load('permissions');
    return view('users.roles.show', compact('role'));
    
   }

   public  function edit(Role $role)
   {
      abort_if( Gate::denies('role_edit'), 403);
      $permissions=Permission::all()->pluck('name','id');
      $role->load('permissions');

      return view('users.roles.edit', compact('role','permissions'));

   }
   public  function update(RolEditRequest $request,$id)
   {
      

    $roleid = Role::findOrFail($id);
    $role= $request->only('name');
    $roleid->update($role);
    $roleid->permissions()->sync($request->input('permissions',[]));

    return redirect()->route('roles.index')->with('success', 'Rol creado conrectamente  actualizado conrrectamente');
    


   }
   public  function destroy(Role $role)
   {
      abort_if( Gate::denies('role_destroy'), 403);

    $role->delete();
    return redirect()->route('roles.index');      
    
   }
}
