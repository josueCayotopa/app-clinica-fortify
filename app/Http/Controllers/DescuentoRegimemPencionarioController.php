<?php

namespace App\Http\Controllers;

use App\Models\DescuentoRegimemPencionario;
use Illuminate\Http\Request;

class DescuentoRegimemPencionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = DescuentoRegimemPencionario::query();

        // Filtrar resultados basados en la búsqueda
        if ($search = $request->input('search')) {
            $query->where('descripcion', 'like', '%' . $search . '%');
        }

        // Obtener los descuentos paginados
        $descuentos = $query->paginate(3); // Paginar por 5 elementos por página

        return view('tipo_descuentos.index', compact('descuentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|unique:descuento_regimem_pencionarios,descripcion',
        ]);

        DescuentoRegimemPencionario::create($request->all());

        return redirect()->route('descuentos_pensiones.create')
            ->with('success', 'Descuento creado exitosamente.');
    }
    public function storeall(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|unique:descuento_regimem_pencionarios,descripcion',
        ]);

        DescuentoRegimemPencionario::create($request->all());

        return redirect()->route('tipos_descuento.index')
            ->with('success', 'Descuento creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DescuentoRegimemPencionario  $descuentoRegimemPencionario
     * @return \Illuminate\Http\Response
     */
    public function show(DescuentoRegimemPencionario $descuentoRegimemPencionario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DescuentoRegimemPencionario  $descuentoRegimemPencionario
     * @return \Illuminate\Http\Response
     */
    public function edit(DescuentoRegimemPencionario $descuentoRegimemPencionario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DescuentoRegimemPencionario  $descuentoRegimemPencionario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // Validar los datos de entrada
        $request->validate([
            'descripcion' => 'required|string|max:255',
        ]);

        try {
            // Buscar el tipo de descuento por su ID
            $descuento = DescuentoRegimemPencionario::findOrFail($id);

            // Actualizar los atributos del tipo de descuento
            $descuento->descripcion = $request->descripcion;
            $descuento->save();

            // Redireccionar con un mensaje de éxito
            return redirect()->route('tipos_descuento.index')->with('success', 'Tipo de descuento actualizado exitosamente.');
        } catch (\Throwable $th) {
            // Manejar cualquier error que ocurra durante la actualización
            return back()->withErrors(['error' => 'Ocurrió un error al actualizar el tipo de descuento.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DescuentoRegimemPencionario  $descuentoRegimemPencionario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            // Buscar el tipo de descuento por su ID
            $descuento = DescuentoRegimemPencionario::findOrFail($id);
    
            // Eliminar el tipo de descuento
            $descuento->delete();
    
            // Redireccionar con un mensaje de éxito
            return redirect()->route('tipos_descuento.index')->with('success', 'Tipo de descuento eliminado exitosamente.');
        } catch (\Throwable $th) {
            // Manejar cualquier error que ocurra durante la eliminación
            return back()->withErrors(['error' => 'Ocurrió un error al eliminar el tipo de descuento.']);
        }
    }
}
