<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AsistenciaImport;
use App\Models\Asistencia;


class AsistenciaController extends Controller
{
    public function import(Request $request){
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);
    
        Excel::import(new AsistenciaImport, $request->file('file'));
    
        return redirect()->back()->with('success', 'Asistencia importada exitosamente.');
    }

    public function index()
{
    $asistencias = Asistencia::all();
    return view('asistencia.index', compact('asistencias'));
}

}
