<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionCreateRequest;
use App\Http\Requests\PermissionEditRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        abort_if( Gate::denies('permission_index'), 403);
        $permissions=Permission::paginate(5);
        return view('users.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        abort_if( Gate::denies('permission_create'), 403);
        return view('users.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionCreateRequest $request)
    {
        //
        Permission::create($request->validated());

        return redirect()->route('permissions.index')->with('success', 'Permiso creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($permission)
    {
        abort_if( Gate::denies('permission_show'), 403);
        //
        $permission = Permission::find($permission);
        return view('users.permissions.show', compact('permission'));





    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        abort_if( Gate::denies('permission_edit'), 403);
        //
        return view('users.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionEditRequest $request, $id)
    {
        
        //
        $permissionid = Permission::findOrFail($id);
        $permission = $request->only('name');
        $permissionid->update($permission);
        return redirect()->route('permissions.index')->with('success', 'Permiso creado conrectamente  actualizado conrrectamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        abort_if( Gate::denies('permission_destroy'), 403);
        $permission->delete();
        return redirect()->route('permissions.index');      
    }
}
