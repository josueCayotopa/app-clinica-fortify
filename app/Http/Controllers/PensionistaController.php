<?php

namespace App\Http\Controllers;

use App\Models\Pensionista;
use Illuminate\Http\Request;

class PensionistaController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pensionistas = Pensionista::all();
        return view('pensionistas.index', compact('pensionistas'));
        if ($request->ajax()) {
            return response()->json([
                'view' => view('pensionistas.index', compact('pensionistas'))->render(),
                'url' => route('pensionistas.index', $request->query())
            ]);
        }
        return view('home')->with([
            'view' => 'pensionistas.index',
            'data' => compact('pensionistas'),
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if ($request->ajax()) {
            return response()->json([
                'view' => view('pensionistas.create')->render(),
                'url' => route('pensionistas.create', $request->query())
            ]);
        }
        return view('home')->with([
            'view' => 'pensionistas.create',
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tipo_documento_id' => 'required|exists:tipo_documentos,id',
            'numero_documento' => 'required|string|max:15',
            'tipo_trabajador_id' => 'required|exists:tipo_trabajadors,id',
            'regimen_pencionario_id' => 'required|exists:regimen_pencionarios,id',
            'fecha_inscirpcion' => 'required|date',
            'cuspp' => 'required|string|max:12',
            'situacion_e_p_s_id' => 'required|exists:situacion_e_p_s,id',
            'tipo_pago_id' => 'required|exists:tipo_pagos,id',
        ]);

        $pensionista = Pensionista::create($validatedData);

        return redirect()->route('pensionistas.index')->with('success', 'Pensionista creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pensionista = Pensionista::findOrFail($id);
        return view('pensionistas.show', compact('pensionista'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id,Request $request )
    {

        $pensionista = Pensionista::findOrFail($id);
        if ($request->ajax()) {
            return response()->json([
                'view' => view('pensionistas.edit', compact('pensionista'))->render(),
                'url' => route('pensionistas.edit', $request->query())
            ]);
        }
        return view('home')->with([
            'view' => 'pensionistas.edit',
            'data'=>compact('pensionista'),
            
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tipo_documento_id' => 'required|exists:tipo_documentos,id',
            'numero_documento' => 'required|string|max:15',
            'tipo_trabajador_id' => 'required|exists:tipo_trabajadors,id',
            'regimen_pencionario_id' => 'required|exists:regimen_pencionarios,id',
            'fecha_inscirpcion' => 'required|date',
            'cuspp' => 'required|string|max:12',
            'situacion_e_p_s_id' => 'required|exists:situacion_e_p_s,id',
            'tipo_pago_id' => 'required|exists:tipo_pagos,id',
        ]);

        $pensionista = Pensionista::findOrFail($id);
        $pensionista->update($validatedData);

        return redirect()->route('pensionistas.index')->with('success', 'Pensionista actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pensionista = Pensionista::findOrFail($id);
        $pensionista->delete();

        return redirect()->route('pensionistas.index')->with('success', 'Pensionista eliminado exitosamente.');
    }
}
