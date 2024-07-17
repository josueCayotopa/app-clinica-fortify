<?php

namespace App\Http\Controllers;

use App\Models\DatosPersonal;
use App\Models\Licencias;
use App\Models\Personal;
use App\Models\TipoSuspencion;
use App\Models\TipoSuspension;
use Illuminate\Http\Request;

class LicenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $licencias = Licencias::paginate(10); // Ejemplo de paginación, ajusta según necesites
        return view('licencias.index', compact('licencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tipoSuspension=TipoSuspension::all()->pluck('descripcion', 'id');
        $datospersonal=DatosPersonal::all()->pluck('numero_documento', 'id');
        return view('licencias.create', compact('datospersonal', 'tipoSuspension'));
        
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
        $licencia = new Licencias();
        $licencia->trabajador_id = $request->trabajador_id;
        $licencia->tipo_suspencion_id = $request->tipo_suspencion_id;
        $licencia->fecha_inicio = $request->fecha_inicio;
        $licencia->fecha_fin = $request->fecha_fin;
        $licencia->descripcion = $request->descripcion;
        $licencia->save();

        return redirect()->route('licencias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Licencias  $licencias
     * @return \Illuminate\Http\Response
     */
    public function show(Licencias $licencias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Licencias  $licencias
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $licencia = Licencias::findOrFail($id);
        $tipoSuspension = TipoSuspension::whereIn('id', [11, 12])->pluck('descripcion', 'id');
        $datospersonal=DatosPersonal::all()->pluck('numero_documento', 'id');
        return view('licencias.create', compact('datospersonal', 'tipoSuspension','licencia'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Licencias  $licencias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $licencia = Licencias::findOrFail($id);
        $licencia->update($request->all());
        return redirect()->route('licencias.index')->with('success', 'Licencia actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Licencias  $licencias
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        {
            $licencia = Licencias::findOrFail($id);
            $licencia->delete();
            return redirect()->route('licencias.index')->with('success', 'Licencia eliminada correctamente');
        }
    }
}
