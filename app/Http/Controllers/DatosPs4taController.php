<?php

namespace App\Http\Controllers;

use App\Models\DatosPs4ta;
use Illuminate\Http\Request;

class DatosPs4taController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datosPs4tas = DatosPs4ta::all();
        return view('datos_ps4tas.index', compact('datosPs4tas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('datos_ps4tas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tipo_documento_id' => 'required|exists:tipo_documentos,id',
            'numero_documento' => 'required|string|max:15',
            'ruc' => 'nullable|string|max:11',
            'convenio_id' => 'required|exists:convenios,id',
        ]);

        DatosPs4ta::create($validatedData);

        return redirect()->route('datos_ps4tas.index')->with('success', 'Datos PS4ta creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $datosPs4ta = DatosPs4ta::findOrFail($id);
        return view('datos_ps4tas.show', compact('datosPs4ta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $datosPs4ta = DatosPs4ta::findOrFail($id);
        return view('datos_ps4tas.edit', compact('datosPs4ta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tipo_documento_id' => 'required|exists:tipo_documentos,id',
            'numero_documento' => 'required|string|max:15',
            'ruc' => 'nullable|string|max:11',
            'convenio_id' => 'required|exists:convenios,id',
        ]);

        $datosPs4ta = DatosPs4ta::findOrFail($id);
        $datosPs4ta->update($validatedData);

        return redirect()->route('datos_ps4tas.index')->with('success', 'Datos PS4ta actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $datosPs4ta = DatosPs4ta::findOrFail($id);
        $datosPs4ta->delete();

        return redirect()->route('datos_ps4tas.index')->with('success', 'Datos PS4ta eliminado exitosamente.');
    }
}
