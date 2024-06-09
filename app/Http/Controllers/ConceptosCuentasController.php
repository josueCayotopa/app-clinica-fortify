<?php

namespace App\Http\Controllers;

use App\Models\ConceptosCuentas;
use Illuminate\Http\Request;

class ConceptosCuentasController extends Controller
{
    public function index()
    {
        $conceptosCuentas = ConceptosCuentas::all();
        return view('conceptos_cuentas.index', compact('conceptosCuentas'));
    }

    public function show($codigo)
    {
        $conceptosCuenta = ConceptosCuentas::findOrFail($codigo);
        return view('conceptos_cuentas.show', compact('conceptosCuenta'));
    }

    public function create()
    {
        return view('conceptos_cuentas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'CODIGO' => 'required|string|max:20|unique:conceptos_cuentas',
            'DESCRIPCION' => 'nullable|string|max:255',
            'CODIGO_CUENTA_CON' => 'nullable|string|max:20',
            'CODIGO_CONCEPTO' => 'required|string|exists:conceptos,COD_CONCEPTO',
        ]);

        ConceptosCuentas::create($request->all());

        return redirect()->route('conceptos_cuentas.index')->with('success', 'Conceptos Cuenta creado exitosamente.');
    }
    public function edit(ConceptosCuentas $conceptosCuentas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ConceptosCuentas  $conceptosCuentas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConceptosCuentas $conceptosCuentas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConceptosCuentas  $conceptosCuentas
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConceptosCuentas $conceptosCuentas)
    {
        //
    }
}
