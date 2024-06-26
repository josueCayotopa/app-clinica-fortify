<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asistencia;

class AsistenciaController extends Controller
{
    public function index()
    {
        $asistencias = Asistencia::all();
        return view('asistenciaa.index', compact('asistencias'));
    }

    // Supongamos que esta función recibe los datos del sistema biométrico y los guarda
    public function registrarEntradaSalida(Request $request)
    {
        $asistencia = Asistencia::firstOrCreate(
            ['nombre' => $request->nombre, 'fecha' => $request->fecha],
            ['hora_entrada' => $request->hora_entrada, 'hora_salida' => $request->hora_salida]
        );

        if ($request->hora_entrada) {
            $asistencia->hora_entrada = $request->hora_entrada;
        }
        if ($request->hora_salida) {
            $asistencia->hora_salida = $request->hora_salida;
        }
        $asistencia->save();

        return response()->json(['status' => 'ok']);
    }
}
