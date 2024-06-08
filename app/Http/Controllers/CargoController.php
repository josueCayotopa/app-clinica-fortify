<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    public function index()
    {
        $cargos = Cargo::all();
        return view('empleados.maestros.cargos.index', compact('cargos'));
    }

    public function create()
    {
        return view('empleados.maestros.cargos.crear');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required',
            'descripcion' => 'required',
        ]);

        Cargo::create($request->all());

        return redirect()->route('crear-relacion-categoria-cargo')->with('success', 'Cargo creado exitosamente.');
    }

    public function edit(Cargo $cargo)
    {
        return view('empleados.maestros.cargos.editar', compact('cargo'));
    }

    public function update(Request $request, Cargo $cargo)
    {
        $request->validate([
            'codigo' => 'required',
            'descripcion' => 'required',
        ]);

        $cargo->update($request->all());

        return redirect()->route('cargos.index')->with('success', 'Cargo actualizado exitosamente.');
    }

    public function destroy(Cargo $cargo)
    {
        $cargo->delete();
      
        return redirect()->route('cargos.index')->with('success', 'Cargo eliminado exitosamente.');
    }
}
