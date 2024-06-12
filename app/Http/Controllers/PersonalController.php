<?php

namespace App\Http\Controllers;

use App\Models\Convenio;
use App\Models\Departamento_Region;
use App\Models\Distrito;
use App\Models\EPS;
use App\Models\Nacionalidad;
use App\Models\Nivel_educativo;
use App\Models\Ocupacion;
use App\Models\Periodicidad;
use App\Models\Personal;
use App\Models\Provincia;
use App\Models\RegimenPencionario;
use App\Models\SituacionEPS;
use App\Models\Tipo_trabajador;
use App\Models\TipoContratosTrabajo;
use App\Models\TipoDocumento;
use App\Models\TipoPago;
use App\Models\Via;
use App\Models\Zona;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function index()
    {
        $tipoDocumentos = TipoDocumento::all()->pluck('descripcion', 'id');
        $nacionalidades = Nacionalidad::all()->pluck('descripcion', 'id');
        $departamentos = Departamento_Region::all()->pluck('descripcion', 'id');
        $provincias = Provincia::all()->pluck('descripcion', 'id');
        $distritos = Distrito::all()->pluck('descripcion', 'id');
        $zonas = Zona::all()->pluck('descripcion', 'id');
        $vias = Via::all()->pluck('descripcion', 'id');
        $tipoTrabajadores = Tipo_trabajador::all()->pluck('descripcion', 'id');
        $nivelesEducativos = Nivel_educativo::all()->pluck('descripcion', 'id');
       
        $ocupaciones = Ocupacion::all()->pluck('descripcion', 'id');
        $regimenesPensionarios = RegimenPencionario::all()->pluck('descripcion', 'id');
        $tiposContratoTrabajo = TipoContratosTrabajo::all()->pluck('descripcion', 'id');
        $periodicidades = Periodicidad::all()->pluck('descripcion', 'id');
        $eps = EPS::all()->pluck('descripcion', 'id');
        $situacionesEPS = SituacionEPS::all()->pluck('descripcion', 'id');
        $tiposPago = TipoPago::all()->pluck('descripcion', 'id');
        $convenios = Convenio::all()->pluck('descripcion', 'id');
        $personals = Personal::paginate(10);

        return view('empleados.empleados.index', compact('personals','tipoDocumentos', 'nacionalidades', 
        'distritos','zonas', 'vias' ,'tipoTrabajadores','nivelesEducativos', 'ocupaciones' ,
        'regimenesPensionarios', 'tiposContratoTrabajo','periodicidades','eps','situacionesEPS'
        , 'tiposPago','convenios','departamentos','provincias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoDocumentos = TipoDocumento::all()->pluck('descripcion', 'id');;
        $nacionalidades = Nacionalidad::all()->pluck('descripcion', 'id');;
        $distritos = Distrito::all();
        $zonas = Zona::all();
        $vias = Via::all();
        $tipoTrabajadores = Tipo_trabajador::all();
        $nivelesEducativos = Nivel_educativo::all();
        $ocupaciones = Ocupacion::all();
        $regimenesPensionarios = RegimenPencionario::all();
        $tiposContratoTrabajo = TipoContratosTrabajo::all();
        $periodicidades = Periodicidad::all();
        $eps = EPS::all();
        $situacionesEPS = SituacionEPS::all();
        $tiposPago = TipoPago::all();
        $convenios = Convenio::all();
    
        return response()->json(compact('tipoDocumentos', 'nacionalidades', 'distritos', 'zonas', 'vias', 'tipoTrabajadores', 'nivelesEducativos', 'ocupaciones', 'regimenesPensionarios', 'tiposContratoTrabajo', 'periodicidades', 'eps', 'situacionesEPS', 'tiposPago', 'convenios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
           
        ]);

        $personal = Personal::create($validatedData);

        return redirect()->route('personals.index')->with('success', 'Personal created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Personal $personal)
    {
        return view('personals.show', compact('personal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Personal $personal)
    {
        return view('personals.edit', compact('personal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personal $personal)
    {
        $validatedData = $request->validate([
            
        ]);

        $personal->update($validatedData);

        return redirect()->route('personals.index')->with('success', 'Personal updated successfully.');
    }
}
