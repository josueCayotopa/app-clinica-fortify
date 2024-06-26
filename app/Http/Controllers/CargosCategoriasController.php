<?php

namespace App\Http\Controllers;

use App\Models\CargosCategorias;
use App\Models\Categoria;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CargosCategoriasController extends Controller
{
    
    public function index()
    {
        $categorias = Categoria::with('cargosCategorias')->get();
        return view('empleados.maestros.cargo_categoria.vistacargocategoria', compact('categorias'));
    }

    public function create()
    {
        $empresas = Empresa::pluck('nombre_comercial', 'id');
        return view('empleados.maestros.cargo_categoria.CrearCargoCategoria', compact('empresas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'empresa_id' => 'required|exists:empresas,id',
            'codigo' => 'required|string|max:15',
            'descripcion' => 'required|string',
            'nivel' => 'required|string|max:15',
            'factor_hora_extra' => 'required|numeric',
            'factor_dia_viaje' => 'required|numeric',
            'cargosSeleccionados' => 'required|array', // Validar que cargosSeleccionados sea un array
            'cargosSeleccionados.*.codigo' => 'required|string|max:15',
            'cargosSeleccionados.*.descripcion' => 'required|string',
            'cargosSeleccionados.*.ind_directivo' => 'nullable|boolean',
        ]);

        // Guardar la categoría principal
        $categoria = new Categoria();
        $categoria->empresa_id = $request->empresa_id;
        $categoria->codigo = $request->codigo;
        $categoria->descripcion = $request->descripcion;
        $categoria->nivel = $request->nivel;
        $categoria->factor_hora_extra = $request->factor_hora_extra;
        $categoria->factor_dia_viaje = $request->factor_dia_viaje;
        $categoria->save();

        // Guardar los cargos asociados
        foreach ($request->cargosSeleccionados as $cargo) {
            CargosCategorias::create([
                'empresa_id' => $request->empresa_id,
                'categoria_id' => $categoria->id,
                'descripcion' => $cargo['descripcion'],
                'codigo_sunat' => $cargo['codigo'],
                'ind_directivo' => isset($cargo['ind_directivo']) ? '1' : '0', // Convertir booleano a 1 o 0
            ]);
        }

        return redirect()->route('cargos-categorias.index')->with('success', 'Categoría y cargos guardados correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CargosCategorias  $cargosCategorias
     * @return \Illuminate\Http\Response
     */
    public function show($categoria_id)
    {
        //
        $cargos = CargosCategorias::where('categoria_id', $categoria_id)->get();
        return response()->json($cargos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CargosCategorias  $cargosCategorias
     * @return \Illuminate\Http\Response
     */
    public function edit(CargosCategorias $cargosCategorias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CargosCategorias  $cargosCategorias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CargosCategorias $cargosCategorias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CargosCategorias  $cargosCategorias
     * @return \Illuminate\Http\Response
     */
    public function destroy(CargosCategorias $cargosCategorias)
    {
        //
    }
}
