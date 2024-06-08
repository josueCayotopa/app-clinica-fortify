<?php

namespace App\Http\Controllers;

use App\Models\UIT;
use Illuminate\Http\Request;

class UITController extends Controller
{
    public function index()
    {
        $uits = Uit::paginate(5);
        return view('configuracion.uit.index', compact('uits'));
    }

    public function create()
    {
        return view('configuracion.uit.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ano_proceso' => 'required|integer|unique:u_i_t_s,ano_proceso',
            'num_uit_deducible' => 'required|numeric',
        ]);

        Uit::create($request->all());
        return redirect()->route('uits.index')->with('success', 'Asignación de UIT creada exitosamente.');
    }

    public function show($id)
    {
        $uit = Uit::findOrFail($id);
        return view('configuracion.uit.show', compact('uit'));
    }

    public function edit($id)
    {
        $uit = Uit::findOrFail($id);
        return view('configuracion.uit.edit', compact('uit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'num_uit_deducible' => 'required|numeric',
        ]);

        $uit = Uit::findOrFail($id);
        $uit->update($request->all());
        return redirect()->route('uits.index')->with('success', 'Asignación de UIT actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $uit = Uit::findOrFail($id);
        $uit->delete();
        return redirect()->route('uits.index')->with('success', 'Asignación de UIT eliminada exitosamente.');
    }
}
