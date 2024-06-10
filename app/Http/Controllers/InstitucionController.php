<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstitucionStoreRequest;
use App\Models\Institucion;
use Illuminate\Http\Request;

class InstitucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instituciones=Institucion::paginate(10);

        return view('empleados.planillas.instituciones.index', compact('instituciones'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InstitucionStoreRequest $request)
    {
    
        Institucion::create($request->validated());

        return redirect()->route('institucion.index')->with('success', 'Institución creado correctamente');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InstitucionStoreRequest $request, $id)
    {
        
            $insId = Institucion::findOrFail($id);
    
            $inst = $request->only('nombre');
            $insId->update($inst);
            
            return redirect()->route('institucion.index')->with('success', 'Institución actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Institucion $institucion)
    {
        $institucion->delete();
        return redirect()->route('institucion.index')->with('success', 'Institución borrada exitosamente');


    }
}
