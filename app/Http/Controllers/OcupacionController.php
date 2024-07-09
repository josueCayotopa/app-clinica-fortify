<?php

namespace App\Http\Controllers;

use App\Models\Ocupacion;
use App\Models\Tipo_trabajador;
use Illuminate\Http\Request;

class OcupacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tiposTrabajador = Tipo_trabajador::with('ocupaciones')->get();

        return view('tipos_trabajador.index', compact('tiposTrabajador'));
        if ($request->ajax()) {
            return response()->json([
                'view' => view('tipo_trabajadores.index', compact('tiposTrabajador'))->render(),
                'url' => route('tipo_trabajadores.index', $request->query())
            ]);
        }
        return view('home')->with([
            'view' => 'tipo_trabajadores.index',
            'data' => compact('tiposTrabajador'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getOcupaciones($id)
    {
        $ocupaciones = Ocupacion::where('tipo_trabajador_id', $id)->get();
        return response()->json($ocupaciones);
    }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ocupacion  $ocupacion
     * @return \Illuminate\Http\Response
     */
    public function show(Ocupacion $ocupacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ocupacion  $ocupacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Ocupacion $ocupacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ocupacion  $ocupacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ocupacion $ocupacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ocupacion  $ocupacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ocupacion $ocupacion)
    {
        //
        $ocupacion->delete();
    
        return response()->json([
            'message' => 'Ocupación eliminada correctamente.'
        ]);
    }
}
