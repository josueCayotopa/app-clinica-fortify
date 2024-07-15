<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Ocupacion;
use App\Models\Tipo_trabajador;
use Illuminate\Http\Request;

class TipoTrabajadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tiposTrabajador = Tipo_trabajador::with('ocupaciones')->get();

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
    public function getOcupaciones($id)
    {
        $ocupaciones = Ocupacion::where('tipo_trabajador_id', $id)->get();
        return response()->json($ocupaciones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $empresas = Empresa::pluck('nombre_comercial', 'id');
        if ($request->ajax()) {
            return response()->json([
                'view' => view('tipo_trabajadores.create', compact('empresas'))->render(),
                'url' => route('tipo_trabajadores.create', $request->query())
            ]);
        }
        return view('home')->with([
            'view' => 'tipo_trabajadores.create',
            'data' => compact('empresas'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación de los datos recibidos
        $request->validate([
            'empresa_id' => 'required|exists:empresas,id',
            'codigo_sunat' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'nivel' => 'required|string|max:255',
            'factor_hora_extra' => 'required|numeric',
            'factor_dia_viaje' => 'required|numeric',
            'codigo_ocupacion.*' => 'required|string|max:255',
            'descripcion_ocupacion.*' => 'required|string|max:255',
        ]);

        // Crear un nuevo Tipo de Trabajador
        $tipoTrabajador = Tipo_trabajador::create([
            'empresa_id' => $request->empresa_id,
            'codigo_sunat' => $request->codigo_sunat,
            'descripcion' => $request->descripcion,
            'nivel' => $request->nivel,
            'factor_hora_extra' => $request->factor_hora_extra,
            'factor_dia_viaje' => $request->factor_dia_viaje,
        ]);

        // Validar si se creó correctamente el Tipo de Trabajador
        if (!$tipoTrabajador) {
            return redirect()->back()->with('error', 'Error al crear el Tipo de Trabajador.');
        }

        // Iterar sobre las ocupaciones recibidas para crear cada una
        foreach ($request->codigo_ocupacion as $index => $codigo_ocupacion) {
            $ocupacion = new Ocupacion();
            $ocupacion->empresa_id = $request->empresa_id;
            $ocupacion->codigo_sunat = $codigo_ocupacion;
            $ocupacion->descripcion = $request->descripcion_ocupacion[$index];
            $ocupacion->tipo_trabajador_id = $tipoTrabajador->id;
            $ocupacion->save();
        }

        return redirect()->route('tipo_trabajadores.index')->with('success', 'Tipo de Trabajador y Ocupaciones creados exitosamente.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipo_trabajador  $tipo_trabajador
     * @return \Illuminate\Http\Response
     */
    public function show(Tipo_trabajador $tipo_trabajador)
    {
        //

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tipo_trabajador  $tipo_trabajador
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $tipoTrabajador = Tipo_trabajador::with('ocupaciones')->findOrFail($id);
        $empresas = Empresa::pluck('nombre_comercial', 'id');
        if ($request->ajax()) {
            return response()->json([
                'view' => view('tipo_trabajadores.edit', compact('tipoTrabajador', 'empresas'))->render(),
                'url' => route('tipo_trabajadores.edit', $request->query())
            ]);
        }
        return view('home')->with([
            'view' => 'tipo_trabajadores.edit',
            'data' => compact('tipoTrabajador', 'empresas'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tipo_trabajador  $tipo_trabajador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'empresa_id' => 'required|exists:empresas,id',
            'codigo_sunat' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'nivel' => 'string|max:255',
            'factor_hora_extra' => 'numeric',
            'factor_dia_viaje' => 'numeric',
            'codigo_ocupacion.*' => 'string|max:255',
            'descripcion_ocupacion.*' => 'required|string|max:255',
        ]);

        $tipoTrabajador = Tipo_trabajador::findOrFail($id);
        $tipoTrabajador->empresa_id = $request->empresa_id;
        $tipoTrabajador->codigo_sunat = $request->codigo_sunat;
        $tipoTrabajador->descripcion = $request->descripcion;
        $tipoTrabajador->nivel = $request->nivel;
        $tipoTrabajador->factor_hora_extra = $request->factor_hora_extra;
        $tipoTrabajador->factor_dia_viaje = $request->factor_dia_viaje;
        $tipoTrabajador->save();

        $tipoTrabajador->ocupaciones()->delete();

        foreach ($request->codigo_ocupacion as $index => $codigo_ocupacion) {
            $ocupacion = new Ocupacion();
            $ocupacion->codigo_sunat = $codigo_ocupacion;
            $ocupacion->descripcion = $request->descripcion_ocupacion[$index];
            $ocupacion->tipo_trabajador_id = $tipoTrabajador->id;
            $ocupacion->save();
        }

        return redirect()->route('tipo_trabajadores.index')->with('success', 'Tipo de Trabajador y Ocupaciones actualizados exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipo_trabajador  $tipo_trabajador
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tipoTrabajador = Tipo_trabajador::findOrFail($id);
        $tipoTrabajador->ocupaciones()->delete();
        $tipoTrabajador->delete();
        return redirect()->route('tipo_trabajadores.index')->with('danger', 'Tipo de Trabajador y Ocupaciones eliminados exitosamente.');
    }
}
