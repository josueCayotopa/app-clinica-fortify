<?php

namespace App\Http\Controllers;

use App\Models\Distrito;
use App\Models\Ocupacion;
use App\Models\Provincia;
use App\Models\RegimenAfp;
use App\Models\Sucursal;
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
    public function getSucursalesByEmpresa(Request $request)
    {
        $empresa_id = $request->empresa_id;
        $sucursales = Sucursal::where('empresa_id', $empresa_id)->get();

        return response()->json($sucursales);
    }
    public function getOcupacionesByTipoTrabajador($tipo_trabajador_id)
    {
        $ocupaciones = Ocupacion::where('tipo_trabajador_id', $tipo_trabajador_id)->get();

        return response()->json($ocupaciones);
    }
    public function getAfpsByRegimen(Request $request)
    {
        $afps = RegimenAfp::where('regimen_id', $request->regimen_id)->get();
        return response()->json($afps);
    }
}
