<?php

namespace App\Http\Controllers;

use App\Models\CategoriaOcupacional;
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
use App\Models\SCTRPension;
use App\Models\SCTRSalud;
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
    public function index(Request $request)
    {
        $tipoDocumentos = TipoDocumento::all()->pluck('descripcion', 'id');
        $nacionalidades = Nacionalidad::all()->pluck('descripcion', 'id');
        $departamentos = Departamento_Region::all()->pluck('descripcion', 'id');
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
        $sctr_pensions = SCTRPension::all()->pluck('descripcion', 'id');
        $sctr_saluds = SCTRSalud::all()->pluck('descripcion', 'id');
        $categoriaocupacionales = CategoriaOcupacional::all()->pluck('DESCRIPCION', 'id');


        if ($request->ajax()) {
            return response()->json([
                'view' => view('empleados.empleados.index', compact(
                    'personals',
                    'tipoDocumentos',
                    'nacionalidades',
                    'departamentos',
                    'zonas',
                    'vias',
                    'tipoTrabajadores',
                    'nivelesEducativos',
                    'ocupaciones',
                    'regimenesPensionarios',
                    'tiposContratoTrabajo',
                    'periodicidades',
                    'eps',
                    'situacionesEPS',
                    'tiposPago',
                    'convenios',
                    'sctr_pensions',
                    'sctr_saluds',
                    'categoriaocupacionales'
                ))->render(),
                'url' => route('personals.index', $request->query())
            ]);
        }

        return view('home')->with([
            'view' => 'empleados.empleados.index',
            'data' => compact(
                'personals',
                'tipoDocumentos',
                'nacionalidades',
                'departamentos',
                'zonas',
                'vias',
                'tipoTrabajadores',
                'nivelesEducativos',
                'ocupaciones',
                'regimenesPensionarios',
                'tiposContratoTrabajo',
                'periodicidades',
                'eps',
                'situacionesEPS',
                'tiposPago',
                'convenios',
                'sctr_pensions',
                'sctr_saluds',
                'categoriaocupacionales'
            ),
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tipoDocumentos = TipoDocumento::all()->pluck('descripcion', 'id');
        $nacionalidades = Nacionalidad::all()->pluck('descripcion', 'id');
        $departamentos = Departamento_Region::all()->pluck('descripcion', 'id');
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

        $sctr_pensions = SCTRPension::all()->pluck('descripcion', 'id');
        $sctr_saluds = SCTRSalud::all()->pluck('descripcion', 'id');
        $categoriaocupacionales = CategoriaOcupacional::all()->pluck('DESCRIPCION', 'id');
        $provincias = Provincia::pluck('descripcion', 'id');
        $distritos = Distrito::pluck('descripcion', 'id');
      
        if ($request->ajax()) {
            return response()->json([
                'view' => view('empleados.empleados.create', compact(
                    'tipoDocumentos',
                    'nacionalidades',
                    'departamentos',
                    'provincias',
                    'distritos',
                    'zonas',
                    'vias',
                    'tipoTrabajadores',
                    'nivelesEducativos',
                    'ocupaciones',
                    'regimenesPensionarios',
                    'tiposContratoTrabajo',
                    'periodicidades',
                    'eps',
                    'situacionesEPS',
                    'tiposPago',
                    'convenios',
                    'sctr_pensions',
                    'sctr_saluds',
                    'categoriaocupacionales'
                ))->render(),
                'url' => route('personals.create', $request->query())
            ]);
        }

        return view('home')->with([
            'view' => 'empleados.empleados.create',
            'data' => compact(
                'tipoDocumentos',
                'nacionalidades',
                'departamentos',
                'provincias',
                'distritos',
                'zonas',
                'vias',
                'tipoTrabajadores',
                'nivelesEducativos',
                'ocupaciones',
                'regimenesPensionarios',
                'tiposContratoTrabajo',
                'periodicidades',
                'eps',
                'situacionesEPS',
                'tiposPago',
                'convenios',
                'sctr_pensions',
                'sctr_saluds',
                'categoriaocupacionales'
            ),
        ]);
    }



    public function store(Request $request)
    {

        $request->validate([
            'tipo_documento_id' => 'required|exists:tipo_documentos,id',
            'numero_documento' => 'required|string|max:20|min:7',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'nombres' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required|string|max:1',
            'nacionalidad_id' => 'required|integer',
            'telefono' => 'nullable|string|max:20',
            'correo_electronico' => 'nullable|string|email|max:255',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'curriculum' => 'nullable|mimes:pdf,doc,docx|max:2048',
            'essalud_vida' => 'nullable|boolean',
            'domiciliado' => 'nullable|boolean',
            'via_id' => 'required|integer',
            'nombre_via' => 'nullable|string|max:255',
            'numero_via' => 'nullable|string|max:10',
            'interior' => 'nullable|string|max:10',
            'zona_id' => 'required|integer',
            'nombre_zona' => 'nullable|string|max:255',
            'referencia' => 'nullable|string|max:255',
            'departamento_id' => 'required|exists:departamento__regions,id',
            'provincia_id' => 'required|exists:provincias,id',
            'distrito_id' => 'required|exists:distritos,id',
            'tipo_trabajador_id' => 'required|integer',
            'regimen_laboral' => 'required|string|max:255',
            'nivel_edicativo_id' => 'required|integer',
            'ocupacion_id' => 'required|integer',
            'discapacidad' => 'nullable|boolean',
            'regimen_pencionario_id' => 'required|integer',
            'fecha_inscripcion_regimen' => 'nullable|date',
            'CUSPP' => 'nullable|string|max:20',
            'SCTR_salud' => 'nullable|boolean',
            'SCTR_pension' => 'nullable|boolean',
            'contrato_trabajo_id' => 'required|integer',
            'trabajo_sujeto_alt_acum_atip_desc' => 'nullable|boolean',
            'trabajo_sujeto_jornda_maxima' => 'nullable|boolean',
            'trabajo_sujeto_horario_noctur' => 'nullable|boolean',
            'ingresos_quinta_categoria' => 'nullable|boolean',
            'sindicalizado' => 'nullable|boolean',
            'periodicidad_id' => 'required|integer',
            'afiliado_eps_servicios_propios' => 'nullable|boolean',
            'eps_id' => 'required|integer',
            'situacion_id' => 'required|integer',
            'renta_quinta_categoria' => 'nullable|boolean',
            'situacion_especial_trabajador' => 'nullable|string|max:255',
            'tipo_pago_id' => 'required|integer',
            'afilacion_asegura_pension' => 'nullable|string|max:255',
            'categoria_ocupacional_trabajador' => 'required|string|max:255',
            'convenio_id' => 'nullable|integer',
        ]);
        // Crear nueva instancia de Personal
        $personal = new Personal;

        // Asignar valores uno por uno
        $personal->tipo_documento_id = $request->input('tipo_documento_id');
        $personal->numero_documento = $request->input('numero_documento');
        $personal->apellido_paterno = $request->input('apellido_paterno');
        $personal->apellido_materno = $request->input('apellido_materno');
        $personal->nombres = $request->input('nombres');
        $personal->fecha_nacimiento = $request->input('fecha_nacimiento');
        $personal->sexo = $request->input('sexo');
        $personal->nacionalidad_id = $request->input('nacionalidad_id');
        $personal->telefono = $request->input('telefono');
        $personal->correo_electronico = $request->input('correo_electronico');

        // Manejo del archivo de imagen
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/imagenes'), $filename);
            $personal->imagen = 'uploads/imagenes/' . $filename;
        }

        // Manejo del archivo CV
        if ($request->hasFile('curriculum')) {
            $file = $request->file('curriculum');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/cv'), $filename);
            $personal->curriculum = 'uploads/cv/' . $filename;
        }

        // Asignar los demás valores
        $personal->essalud_vida = $request->input('essalud_vida');
        $personal->domiciliado = $request->input('domiciliado');
        $personal->via_id = $request->input('via_id');
        $personal->nombre_via = $request->input('nombre_via');
        $personal->numero_via = $request->input('numero_via');
        $personal->interior = $request->input('interior');
        $personal->zona_id = $request->input('zona_id');
        $personal->nombre_zona = $request->input('nombre_zona');
        $personal->referencia = $request->input('referencia');
        $personal->distrito_id = $request->input('distrito_id');
        $personal->tipo_trabajador_id = $request->input('tipo_trabajador_id');
        $personal->regimen_laboral = $request->input('regimen_laboral');
        $personal->nivel_edicativo_id = $request->input('nivel_edicativo_id');
        $personal->ocupacion_id = $request->input('ocupacion_id');
        $personal->discapacidad = $request->input('discapacidad');
        $personal->regimen_pencionario_id = $request->input('regimen_pencionario_id');
        $personal->fecha_inscripcion_regimen = $request->input('fecha_inscripcion_regimen');
        $personal->CUSPP = $request->input('CUSPP');
        $personal->SCTR_salud = $request->input('SCTR_salud');
        $personal->SCTR_pension = $request->input('SCTR_pension');
        $personal->contrato_trabajo_id = $request->input('contrato_trabajo_id');
        $personal->trabajo_sujeto_alt_acum_atip_desc = $request->input('trabajo_sujeto_alt_acum_atip_desc');
        $personal->trabajo_sujeto_jornda_maxima = $request->input('trabajo_sujeto_jornda_maxima');
        $personal->trabajo_sujeto_horario_noctur = $request->input('trabajo_sujeto_horario_noctur');
        $personal->ingresos_quinta_categoria = $request->input('ingresos_quinta_categoria');
        $personal->sindicalizado = $request->input('sindicalizado');
        $personal->periodicidad_id = $request->input('periodicidad_id');
        $personal->afiliado_eps_servicios_propios = $request->input('afiliado_eps_servicios_propios');
        $personal->eps_id = $request->input('eps_id');
        $personal->situacion_id = $request->input('situacion_id');
        $personal->renta_quinta_categoria = $request->input('renta_quinta_categoria');
        $personal->situacion_especial_trabajador = $request->input('situacion_especial_trabajador');
        $personal->tipo_pago_id = $request->input('tipo_pago_id');
        $personal->afilacion_asegura_pension = $request->input('afilacion_asegura_pension');
        $personal->categoria_ocupacional_trabajador = $request->input('categoria_ocupacional_trabajador');
        $personal->convenio_id = $request->input('convenio_id');

        // Guardar el modelo en la base de datos
        $personal->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('personals.index')->with('success', 'Personal creado correctamente.');
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
    public function edit(Personal $personal,Request $request)
    {
        
        if ($request->ajax()) {
            return response()->json([
                'view' => view('empleados.empleados.edit', compact(
                    'tipoDocumentos',
                    'nacionalidades',
                    'departamentos',
                    'provincias',
                    'distritos',
                    'zonas',
                    'vias',
                    'tipoTrabajadores',
                    'nivelesEducativos',
                    'ocupaciones',
                    'regimenesPensionarios',
                    'tiposContratoTrabajo',
                    'periodicidades',
                    'eps',
                    'situacionesEPS',
                    'tiposPago',
                    'convenios',
                    'sctr_pensions',
                    'sctr_saluds',
                    'categoriaocupacionales'
                ))->render(),
                'url' => route('personals.edit', $request->query())
            ]);
        }

        return view('home')->with([
            'view' => 'empleados.empleados.edit',
            'data' => compact(
                'tipoDocumentos',
                'nacionalidades',
                'departamentos',
                'provincias',
                'distritos',
                'zonas',
                'vias',
                'tipoTrabajadores',
                'nivelesEducativos',
                'ocupaciones',
                'regimenesPensionarios',
                'tiposContratoTrabajo',
                'periodicidades',
                'eps',
                'situacionesEPS',
                'tiposPago',
                'convenios',
                'sctr_pensions',
                'sctr_saluds',
                'categoriaocupacionales'
            ),
        ]);
        
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
        $validatedData = $request->validate([]);

        $personal->update($validatedData);

        return redirect()->route('personals.index')->with('success', 'Personal updated successfully.');
    }
}
