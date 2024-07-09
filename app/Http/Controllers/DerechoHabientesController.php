<?php

namespace App\Http\Controllers;

use App\Models\DatosPersonal;
use App\Models\Departamento_Region;
use App\Models\DerechoHabientes;
use App\Models\Distrito;
use App\Models\Provincia;
use App\Models\Tipo_Establecimiento;
use App\Models\Via;
use App\Models\Zona;
use Illuminate\Http\Request;

class DerechoHabientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $query = DerechoHabientes::query();
        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('nombre_completo', 'like', "%{$search}%")
                  ->orWhere('trabajador_id->nombres', 'like', "%{$search}%");
        }
        $familia_trabajadores = $query->paginate(5);
        if ($request->ajax()) {
            return response()->json([
                'view' => view('familia.index', compact('familia_trabajadores'))->render(),
                'url' => route('familia.index', $request->query())
            ]);
        }
        return view('home')->with([
            'view' => 'familia.index',
            'data' => compact('familia_trabajadores'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personal = DatosPersonal::pluck('nombre_comercial', 'id');
        $departamentos = Departamento_Region::pluck('descripcion', 'id');
        $provincias = Provincia::pluck('descripcion', 'id');
        $distritos = Distrito::pluck('descripcion', 'id');
        $zonas = Zona::pluck('descripcion', 'id');
        $vias = Via::pluck('descripcion', 'id');
        $tipo_establecimientos = Tipo_Establecimiento::pluck('descripcion', 'id');
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
     * @param  \App\Models\DerechoHabientes  $derechoHabientes
     * @return \Illuminate\Http\Response
     */
    public function show(DerechoHabientes $derechoHabientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DerechoHabientes  $derechoHabientes
     * @return \Illuminate\Http\Response
     */
    public function edit(DerechoHabientes $derechoHabientes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DerechoHabientes  $derechoHabientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DerechoHabientes $derechoHabientes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DerechoHabientes  $derechoHabientes
     * @return \Illuminate\Http\Response
     */
    public function destroy(DerechoHabientes $derechoHabientes)
    {
        //
    }
}
