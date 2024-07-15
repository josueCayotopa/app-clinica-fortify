<?php

namespace App\Http\Controllers;

use App\Models\RegimenPencionario;
use Illuminate\Http\Request;

class RegimenPencionarioController extends Controller
{
    public function index()
    {
        $regimenes = RegimenPencionario::all();
        return view('regimen_pencionarios.index', compact('regimenes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo_sunat' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            // Puedes añadir más validaciones según sea necesario
        ]);
    
        // Crear un nuevo objeto RegimenPensionario con los datos recibidos
        $regimen = new RegimenPencionario();
        $regimen->codigo_sunat = $request->codigo_sunat;
        $regimen->descripcion = $request->descripcion;
    
        // Guardar el nuevo régimen pensionario en la base de datos
        $regimen->save();
    
        // Puedes retornar una respuesta JSON con un mensaje de éxito
        return response()->json(['message' => 'Régimen pensionario creado correctamente.']);
    }

    public function update(Request $request, RegimenPencionario $regimenPencionario)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
        ]);

        $regimenPencionario->update($request->all());

        return redirect()->route('regimen_pencionarios.index')
            ->with('success', 'Régimen actualizado exitosamente.');
    }

    public function destroy(RegimenPencionario $regimenPencionario)
    {
        $regimenPencionario->delete();

        return redirect()->route('regimen_pencionarios.index')
            ->with('success', 'Régimen eliminado exitosamente.');
    }
}
