<?php

namespace App\Http\Controllers;

use App\Models\DatosPersonal;
use App\Models\Trabajador;
use App\Models\DatosPeronsal;
use App\Models\Vacaciones;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VacacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$datosPersonales = DatosPersonal::where('dni', $dni)->first();

        $periodosLaborales = [];

        if ($datosPersonales) {
            // Obtener el trabajador relacionado
            $trabajador = $datosPersonales->trabajador;

            if ($trabajador) {
                // Obtener los periodos laborales del trabajador
                $periodosLaborales = $trabajador->periodosLaborales;
            }
        }
*/

$trabajadores = DatosPersonal::with(['trabajador.periodoLaboral'])->get();

foreach ($trabajadores as $datos) {
    if ($datos->trabajador && $datos->trabajador->periodoLaboral) {
        $inicio = Carbon::parse($datos->trabajador->periodoLaboral->fecha_inicio);
        $fin = Carbon::parse($datos->trabajador->periodoLaboral->fecha_fin);

        $diasLaborales = $inicio->diffInDays($fin);
        $aniosLaborales = $inicio->diffInYears($fin);

        // Suponiendo 14 días de vacaciones por año trabajado
        $datos->trabajador->periodoLaboral->dias_vacaciones = $aniosLaborales * 14;
    }
}

        return view('home')->with([
            'view' => 'intranet.vacaciones.solicitud.index',
            'data' => compact('trabajadores')
            
        ]);
    }

    public function asignarVacaciones($id)
    {
        $trabajador = DatosPersonal::with(['trabajador.periodoLaboral'])->findOrFail($id);
       

        return view('home')->with([
            'view' => 'intranet.vacaciones.solicitud.create',
            'data' => compact('trabajador')
            
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacaciones  $vacaciones
     * @return \Illuminate\Http\Response
     */
    public function show(Vacaciones $vacaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacaciones  $vacaciones
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacaciones $vacaciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacaciones  $vacaciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacaciones $vacaciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacaciones  $vacaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacaciones $vacaciones)
    {
        //
    }
}
