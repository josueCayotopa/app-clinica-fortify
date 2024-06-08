<?php

namespace App\Http\Controllers;

use App\Models\Distrito;
use App\Models\Provincia;
use Illuminate\Http\Request;

class UbigeoController extends Controller
{
    //
    public function getProvincias($departamento_id)
    {
        $provincias = Provincia::where('departamento_id', $departamento_id)->pluck('descripcion', 'id');
        return response()->json($provincias);
    }

    public function getDistritos($provincia_id)
    {
        $distritos = Distrito::where('provincia_id', $provincia_id)->pluck('descripcion', 'id');
        return response()->json($distritos);
    }
}
