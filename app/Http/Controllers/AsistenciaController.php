<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asistencia;
use App\Models\DatosPersonal;

class AsistenciaController extends Controller
{ public function index(Request $request)
    {
        $fecha = $request->input('fecha', now()->format('Y-m-d'));
        $asistencias = Asistencia::where('fecha', $fecha)->with('trabajador')->get();
        $trabajadores = DatosPersonal::all();

        return view('asistenciaa.index', compact('asistencias', 'trabajadores', 'fecha'));
    }

    public function marcarTodos(Request $request)
    {
        $fecha = $request->input('fecha', now()->format('Y-m-d'));
        $trabajadores = DatosPersonal::all();

        foreach ($trabajadores as $trabajador) {
            Asistencia::updateOrCreate(
                ['fecha' => $fecha, 'trabajador_id' => $trabajador->id],
                ['hora_entrada' => now(), 'hora_salida' => now()]
            );
        }

        return redirect()->route('asistencias.index', ['fecha' => $fecha])->with('success', 'Todos los empleados han sido marcados como asistidos.');
    }
}