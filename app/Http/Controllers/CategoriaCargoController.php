<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Categoria;

use App\Models\CargoCategoria;
use App\Models\CategoriaCargo;
use Illuminate\Http\Request;

class CategoriaCargoController extends Controller
{
    public function index()
    {
        $categoriasCargos = CargoCategoria::with('categoria', 'cargo')->get();
        return view('empleados.maestros.cargo_categoria.vistacargocategoria', compact('categoriasCargos'));
    }

    public function destroy($id)
    {
        $categoriaCargo = CargoCategoria::findOrFail($id);
        $categoriaCargo->delete();

        return redirect()->route('categoria-cargo.indexcargocategoria')->with('success', 'Relación eliminada con éxito');
    }
    
    public function edit($id)
    {
        $categoriaCargo = CargoCategoria::findOrFail($id);
        $categoria = Categoria::findOrFail($categoriaCargo->categoria_id);
        $cargos = Cargo::all();
        $cargo = Cargo::findOrFail($categoriaCargo->cargo_id);
        
        return view('empleados.maestros.cargo_categoria.EditarCargoControlador', compact('categoriaCargo', 'categoria', 'cargos', 'cargo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'codigo_categoria' => 'required|string|max:255',
            'descripcion_categoria' => 'required|string|max:255',
            'nivel_categoria' => 'required|string|max:255',
            'factor_hora_extra' => 'required|numeric',
            'factor_dia_viaje' => 'required|numeric',
            'selected_cargo_id' => 'required|exists:cargos,id', // Validar que el ID del cargo seleccionado exista en la tabla
            'codigo_cargo.*' => 'required|string|max:255',
            'descripcion_cargo.*' => 'required|string|max:255',
        ]);
    
        $categoriaCargo = CargoCategoria::findOrFail($id);
        $categoria = Categoria::findOrFail($categoriaCargo->categoria_id);
    
        // Actualizar los datos de la categoría
        $categoria->update([
            'codigo' => $request->codigo_categoria,
            'descripcion' => $request->descripcion_categoria,
            'nivel' => $request->nivel_categoria,
            'factor_hora_extra' => $request->factor_hora_extra,
            'factor_dia_viaje' => $request->factor_dia_viaje,
        ]);
    
        // Obtener el ID del cargo seleccionado
        $cargoId = $request->input('selected_cargo_id');
    
        // Actualizar los datos del cargo seleccionado
        $cargo = Cargo::findOrFail($cargoId);
        $cargo->update([
            'codigo' => $request->input("codigo_cargo.$cargoId"),
            'descripcion' => $request->input("descripcion_cargo.$cargoId"),
        ]);
    
        // Actualizar la relación del cargo
        $categoriaCargo->cargo_id = $cargoId;
        $categoriaCargo->save();
    
        return redirect()->route('categoria-cargo.indexcargocategoria')->with('success', 'Relación actualizada con éxito');
    }
    public function create()
{
    
    $cargos = Cargo::all();

    // Devolver la vista de creación con los datos de los cargos
    return view('empleados.maestros.cargo_categoria.CrearCargoCategoria', compact('cargos'));
}
    

public function store(Request $request)
{
    $request->validate([
        'factor_hora_extra' => 'numeric', 
        'factor_dia_viaje' => 'numeric', 
    ], [
        'factor_hora_extra.numeric' => 'Solo se aceptan valores numéricos para el factor hora extra.',
        'factor_dia_viaje.numeric' => 'Solo se aceptan valores numéricos para el factor día viaje.',
    ]);

    $categoria = Categoria::create([
        'codigo' => $request->codigo_categoria,
        'descripcion' => $request->descripcion_categoria,
        'nivel' => $request->nivel_categoria,
        'factor_hora_extra' => $request->factor_hora_extra,
        'factor_dia_viaje' => $request->factor_dia_viaje,
    ]);

    $categoriaCargo = CargoCategoria::create([
        'categoria_id' => $categoria->id,
        'cargo_id' => $request->cargo_id,
    ]);

    return redirect()->route('categoria-cargo.indexcargocategoria')->with('success', 'Relación creada con éxito');
}
}
