<?php

namespace App\Http\Controllers;

use App\Models\CategoriaPeriodo;
use App\Models\Departamento_Region;
use App\Models\Distrito;
use App\Models\MotivoFinPeriodo;
use App\Models\Nacionalidad;
use App\Models\Nivel_educativo;
use App\Models\Ocupacion;
use App\Models\Pensionista;
use App\Models\PeriodoLaboral;
use App\Models\Provincia;
use App\Models\RegimenPencionario;
use App\Models\RemuneracionPencionista;
use App\Models\SituacionEPS;
use App\Models\SucursalEstablecimientoLaboral;
use App\Models\TipoBanco;
use App\Models\TipoContratosTrabajo;
use App\Models\TipoDocumento;
use App\Models\TipoPago;
use App\Models\TipoPensionista;
use App\Models\Via;
use App\Models\Zona;
use App\Models\ConceptoSunat;
use App\Models\DatosPersonal;
use App\Models\Empresa;
use App\Models\EmpresaMeDestacan;
use App\Models\EstableciminetosPropios;
use App\Models\ModalidadFormativa;
use App\Models\Sucursal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

class PensionistaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('user_index'), 403);


        $query = DatosPersonal::query();

        // Filtrar por número de documento (dni)
        if ($request->has('dni')) {
            $dni = $request->input('dni');
            $query->where('numero_documento', 'like', "%$dni%");
        }

        // Filtrar por nombre
        if ($request->has('nombre')) {
            $nombre = $request->input('nombre');
            $query->where('nombres', 'like', "%$nombre%");
        }

        $datosPersonales = $query->paginate(5); // Paginar los resultados

        if ($request->ajax()) {
            return response()->json([
                'view' => view('pensionistas.index', compact('datosPersonales'))->render(),
                'url' => route('pensionistas.index', $request->query())
            ]);
        }

        return view('home')->with([
            'view' => 'pensionistas.index',
            'data' => compact('datosPersonales'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // datos generales
        $tipoDocumento = TipoDocumento::all();
        //laborales
        $nivel_educativo = Nivel_educativo::pluck('descripcion', 'id');
        $ocupacion = Ocupacion::pluck('descripcion', 'id');
        $tipoContrato = TipoContratosTrabajo::pluck('descripcion', 'id');
        //datosPensionista
        $tipoPensionistas = TipoPensionista::all();
        $regimenPencionario = RegimenPencionario::all();
        $modalidadFormativa = ModalidadFormativa::all();


        //periodolaboral
        $categoriaPeriodo = CategoriaPeriodo::pluck('descripcion', 'id');
        $motivoFinPeriodo = MotivoFinPeriodo::pluck('descripcion', 'id');

        $conceptoSunat = ConceptoSunat::all();
        $situacionEPS = SituacionEPS::all();
        $tipoPagos = TipoPago::all();
        $tipoBancos = TipoBanco::all();
        $periodoLaborales = PeriodoLaboral::all();
        $remuneracionPensionistas = RemuneracionPencionista::all();
        $sucursalEstablecimientos = SucursalEstablecimientoLaboral::all();
        //datosDomicilio
        $nacionalidad = Nacionalidad::pluck('descripcion', 'id');
        $departamentos = Departamento_Region::pluck('descripcion', 'id');
        $provincias = Provincia::pluck('descripcion', 'id');
        $distritos = Distrito::pluck('descripcion', 'id');
        $zonas = Zona::pluck('descripcion', 'id');
        $vias = Via::pluck('descripcion', 'id');

        //sucursal
        $sucursalEstablecimiento = SucursalEstablecimientoLaboral::all();
        $sucursal = Sucursal::pluck('nombre_sucursal', 'id');
        $empresa = Empresa::pluck('nombre_comercial', 'id');
        $empresaDestacan = EmpresaMeDestacan::all();

        $data = compact(
            'tipoPensionistas',
            'tipoDocumento',
            'regimenPencionario',
            'situacionEPS',
            'tipoPagos',
            'nivel_educativo',
            'tipoBancos',
            'periodoLaborales',
            'remuneracionPensionistas',
            'sucursalEstablecimientos',
            'sucursal',
            'categoriaPeriodo',
            'motivoFinPeriodo',
            'conceptoSunat',
            'nacionalidad',
            'departamentos',
            'provincias',
            'distritos',
            'zonas',
            'vias',
            'empresa',
            'empresaDestacan',

        );
        if ($request->ajax()) {
            return response()->json([
                'view' => view('pensionistas.create', $data)->render(),
                'url' => route('pensionistas.create', $request->query())
            ]);
        }
        return view('home')->with([
            /* 'view' => view('pensionistas.create', $data)->render(),
            'data' => compact('data', $request->query()) */
            'view' => 'pensionistas.create',
            'data' => $data,

        ]);

        /* return view('pensionistas.create', $data); */
    }

    /**
     * Store a newly created resource in storage.
     */
    /* public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tipo_documento_id' => 'required|exists:tipo_documentos,id',
            'numero_documento' => 'required|string|max:15',
            'tipo_trabajador_id' => 'required|exists:tipo_trabajadors,id',
            'regimen_pencionario_id' => 'required|exists:regimen_pencionarios,id',
            'fecha_inscirpcion' => 'required|date',
            'cuspp' => 'required|string|max:12',
            'situacion_e_p_s_id' => 'required|exists:situacion_e_p_s,id',
            'tipo_pago_id' => 'required|exists:tipo_pagos,id',
            'nivel_educativo_id' => 'required|exists:nivel_educativos,id',
            
        ]);
        $datosPersonales = ;


        $pensionista = Pensionista::create($validatedData);



        return redirect()->route('pensionistas.index')->with('success', 'Pensionista creado exitosamente.');
    } */

    public function store(Request $request)
    {
        // Validar los datos del request
        $request->validate([
            // Validaciones para Pensionista
            'tipo_pensionista_id' => 'required|integer',
            'regimen_pensionario_id' => 'required|integer',
            'fecha_inscripcion' => 'required|date',
            'cussp' => 'required|string|max:255',
            'situacion_e_p_s_id' => 'required|integer',
            'tipo_pago_id' => 'required|integer',
            'tipo_banco_id' => 'required|integer',
            'numero_bancaria' => 'required|string|max:255',
            'monto_pago' => 'required|numeric',
            'periodo_laboral_id' => 'required|integer',
            'derechohabientes' => 'required|string|max:255',
            'remuneracion_pensionista_id' => 'required|integer',
            'sucursal_establecimiento_laboral_id' => 'required|integer',
            // Validaciones para Datos Personales
            'tipo_documento_id' => 'required|integer',
            'numero_documento' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'nombres' => 'required|string|max:255',
            'imagen' => 'nullable|image|max:2048',  // Validación de imagen
            'curriculum' => 'nullable|file|mimes:pdf,doc,docx|max:2048',  // Validación de archivo
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required|string|max:1',
            'nacionalidad_id' => 'required|integer',
            'telefono' => 'required|string|max:255',
            'correo_electronico' => 'required|email|max:255',
            'essalud_vida' => 'required|boolean',
            'domiciliado' => 'required|boolean',
            'via_id' => 'required|integer',
            'nombre_via' => 'required|string|max:255',
            'numero_via' => 'required|string|max:255',
            'interior' => 'nullable|string|max:255',
            'zona_id' => 'required|integer',
            'nombre_zona' => 'required|string|max:255',
            'referencia' => 'nullable|string|max:255',
            'distrito_id' => 'required|integer',
            'trabajador_id' => 'nullable|integer',
            'trabajador_cuarta_categoria_id' => 'nullable|integer',
            'modalidad_formativa_id' => 'nullable|integer',

            // Validación para datos de periodo laboral
            'categoria_periodos_id' => 'required|integer',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date|after_or_equal:fecha_inicio',
            'motivo_fin_id' => 'nullable|integer',

            //Validación para remuneracion            		
            'concepto_sunat_id' => 'required|integer',
            'monto_devengado' => 'required|integer',
            'monto_pagado' => 'required|integer',
        ]);

        DB::beginTransaction();

        try {
            // Crear el pensionista
            $pensionista = Pensionista::create([
                'tipo_pensionista_id' => $request->input('tipo_pensionista_id'),
                'regimen_pensionario_id' => $request->input('regimen_pensionario_id'),
                'fecha_inscripcion' => $request->input('fecha_inscripcion'),
                'cussp' => $request->input('cussp'),
                'situacion_e_p_s_id' => $request->input('situacion_e_p_s_id'),
                'tipo_pago_id' => $request->input('tipo_pago_id'),
                'tipo_banco_id' => $request->input('tipo_banco_id'),
                'numero_bancaria' => $request->input('numero_bancaria'),
                'monto_pago' => $request->input('monto_pago'),
                'periodo_laboral_id' => $request->input('periodo_laboral_id'),
                'derechohabientes' => $request->input('derechohabientes'),
                'remuneracion_pensionista_id' => $request->input('remuneracion_pensionista_id'),
                'sucursal_establecimiento_laboral_id' => $request->input('sucursal_establecimiento_laboral_id'),
            ]);

            // Manejar la carga de archivos (si existen)
            $imagenPath = $request->file('imagen') ? $request->file('imagen')->store('imagenes', 'public') : null;
            $curriculumPath = $request->file('curriculum') ? $request->file('curriculum')->store('curriculums', 'public') : null;

            // Crear los datos personales asociados
            $datosPersonales = new DatosPersonal([
                'tipo_documento_id' => $request->input('tipo_documento_id'),
                'numero_documento' => $request->input('numero_documento'),
                'apellido_paterno' => $request->input('apellido_paterno'),
                'apellido_materno' => $request->input('apellido_materno'),
                'nombres' => $request->input('nombres'),
                'imagen' => $imagenPath,
                'curriculum' => $curriculumPath,
                'fecha_nacimiento' => $request->input('fecha_nacimiento'),
                'sexo' => $request->input('sexo'),
                'nacionalidad_id' => $request->input('nacionalidad_id'),
                'telefono' => $request->input('telefono'),
                'correo_electronico' => $request->input('correo_electronico'),
                'essalud_vida' => $request->input('essalud_vida'),
                'domiciliado' => $request->input('domiciliado'),
                'via_id' => $request->input('via_id'),
                'nombre_via' => $request->input('nombre_via'),
                'numero_via' => $request->input('numero_via'),
                'interior' => $request->input('interior'),
                'zona_id' => $request->input('zona_id'),
                'nombre_zona' => $request->input('nombre_zona'),
                'referencia' => $request->input('referencia'),
                'distrito_id' => $request->input('distrito_id'),
                'trabajador_id' => $request->input('trabajador_id'),
                'pensionista_id' => $pensionista->id,
                'trabajador_cuarta_categoria_id' => $request->input('trabajador_cuarta_categoria_id'),
                'modalidad_formativa_id' => $request->input('modalidad_formativa_id'),
            ]);

            $datosPersonales->save();

            // Crear el periodo laboral asociado
            $periodoLaboral = new PeriodoLaboral([
                'categoria_periodos_id' => $request->input('categoria_periodos_id'),
                'fecha_inicio' => $request->input('fecha_inicio'),
                'fecha_fin' => $request->input('fecha_fin'),
                'motivo_fin_id' => $request->input('motivo_fin_id'),

            ]);

            $periodoLaboral->save();

            // Crear la remuneración asociada
            $remuneracion = new RemuneracionPencionista([
                'concepto_sunat_id' => $request->input('concepto_sunat_id'),
                'monto_devengado' => $request->input('monto_devengado'),
                'monto_pagado' => $request->input('monto_pagado'),
                'pensionista_id' => $pensionista->id,
            ]);
            $remuneracion->save();

            DB::commit();

            return redirect()->route('pensionistas.index')->with('success', 'Pensionista, datos personales y periodo laboral agregados exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors('Error al crear el pensionista: ' . $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pensionista = Pensionista::findOrFail($id);
        return view('pensionistas.show', compact('pensionista'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, Request $request)
    {

        $pensionista = Pensionista::findOrFail($id);
        if ($request->ajax()) {
            return response()->json([
                'view' => view('pensionistas.edit', compact('pensionista'))->render(),
                'url' => route('pensionistas.edit', $request->query())
            ]);
        }
        return view('home')->with([
            'view' => 'pensionistas.edit',
            'data' => compact('pensionista'),

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    /* public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tipo_documento_id' => 'required|exists:tipo_documentos,id',
            'numero_documento' => 'required|string|max:15',
            'tipo_trabajador_id' => 'required|exists:tipo_trabajadors,id',
            'regimen_pencionario_id' => 'required|exists:regimen_pencionarios,id',
            'fecha_inscirpcion' => 'required|date',
            'cuspp' => 'required|string|max:12',
            'situacion_e_p_s_id' => 'required|exists:situacion_e_p_s,id',
            'tipo_pago_id' => 'required|exists:tipo_pagos,id',
            'nivel_educativo_id' => 'required|exists:nivel_educativos,id',
        ]);

        $pensionista = Pensionista::findOrFail($id);
        $pensionista->update($validatedData);

        return redirect()->route('pensionistas.index')->with('success', 'Pensionista actualizado exitosamente.');
    } */
    /* public function update(Request $request, $id)
    {
        // Validar los datos del request
        $request->validate([
            // Validaciones para Pensionista
            'tipo_pensionista_id' => 'required|integer',
            'regimen_pensionario_id' => 'required|integer',
            'fecha_inscripcion' => 'required|date',
            'cussp' => 'required|string|max:255',
            'situacion_e_p_s_id' => 'required|integer',
            'tipo_pago_id' => 'required|integer',
            'tipo_banco_id' => 'required|integer',
            'numero_bancaria' => 'required|string|max:255',
            'monto_pago' => 'required|numeric',
            'periodo_laboral_id' => 'required|integer',
            'derechohabientes' => 'required|string|max:255',
            'remuneracion_pensionista_id' => 'required|integer',
            'sucursal_establecimiento_laboral_id' => 'required|integer',
            // Validaciones para Datos Personales
            'tipo_documento_id' => 'required|integer',
            'numero_documento' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'nombres' => 'required|string|max:255',
            'imagen' => 'nullable|image|max:2048',  // Validación de imagen
            'curriculum' => 'nullable|file|mimes:pdf,doc,docx|max:2048',  // Validación de archivo
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required|string|max:1',
            'nacionalidad_id' => 'required|integer',
            'telefono' => 'required|string|max:255',
            'correo_electronico' => 'required|email|max:255',
            'essalud_vida' => 'required|boolean',
            'domiciliado' => 'required|boolean',
            'via_id' => 'required|integer',
            'nombre_via' => 'required|string|max:255',
            'numero_via' => 'required|string|max:255',
            'interior' => 'nullable|string|max:255',
            'zona_id' => 'required|integer',
            'nombre_zona' => 'required|string|max:255',
            'referencia' => 'nullable|string|max:255',
            'distrito_id' => 'required|integer',
            'trabajador_id' => 'nullable|integer',
            'trabajador_cuarta_categoria_id' => 'nullable|integer',
            'modalidad_formativa_id' => 'nullable|integer',
        ]);

        // Actualizar el pensionista
        $pensionista = Pensionista::findOrFail($id);
        $pensionista->update([
            'tipo_pensionista_id' => $request->input('tipo_pensionista_id'),
            'regimen_pensionario_id' => $request->input('regimen_pensionario_id'),
            'fecha_inscripcion' => $request->input('fecha_inscripcion'),
            'cussp' => $request->input('cussp'),
            'situacion_e_p_s_id' => $request->input('situacion_e_p_s_id'),
            'tipo_pago_id' => $request->input('tipo_pago_id'),
            'tipo_banco_id' => $request->input('tipo_banco_id'),
            'numero_bancaria' => $request->input('numero_bancaria'),
            'monto_pago' => $request->input('monto_pago'),
            'periodo_laboral_id' => $request->input('periodo_laboral_id'),
            'derechohabientes' => $request->input('derechohabientes'),
            'remuneracion_pensionista_id' => $request->input('remuneracion_pensionista_id'),
            'sucursal_establecimiento_laboral_id' => $request->input('sucursal_establecimiento_laboral_id'),
        ]);

        // Manejar la carga de archivos (si existen)
        $imagenPath = $request->file('imagen') ? $request->file('imagen')->store('imagenes') : $pensionista->datosPersonales->imagen;
        $curriculumPath = $request->file('curriculum') ? $request->file('curriculum')->store('curriculums') : $pensionista->datosPersonales->curriculum;

        // Actualizar los datos personales asociados
        $datosPersonales = DatosPersonal::where('pensionista_id', $id)->firstOrFail();
        $datosPersonales->update([
            'tipo_documento_id' => $request->input('tipo_documento_id'),
            'numero_documento' => $request->input('numero_documento'),
            'apellido_paterno' => $request->input('apellido_paterno'),
            'apellido_materno' => $request->input('apellido_materno'),
            'nombres' => $request->input('nombres'),
            'imagen' => $imagenPath,
            'curriculum' => $curriculumPath,
            'fecha_nacimiento' => $request->input('fecha_nacimiento'),
            'sexo' => $request->input('sexo'),
            'nacionalidad_id' => $request->input('nacionalidad_id'),
            'telefono' => $request->input('telefono'),
            'correo_electronico' => $request->input('correo_electronico'),
            'essalud_vida' => $request->input('essalud_vida'),
            'domiciliado' => $request->input('domiciliado'),
            'via_id' => $request->input('via_id'),
            'nombre_via' => $request->input('nombre_via'),
            'numero_via' => $request->input('numero_via'),
            'interior' => $request->input('interior'),
            'zona_id' => $request->input('zona_id'),
            'nombre_zona' => $request->input('nombre_zona'),
            'referencia' => $request->input('referencia'),
            'distrito_id' => $request->input('distrito_id'),
            'trabajador_id' => $request->input('trabajador_id'),
            'trabajador_cuarta_categoria_id' => $request->input('trabajador_cuarta_categoria_id'),
            'modalidad_formativa_id' => $request->input('modalidad_formativa_id'),
        ]);

        return redirect()->route('pensionistas.index')->with('success', 'Pensionista y datos personales actualizados exitosamente');
    } */

    public function update(Request $request, $id)
    {
        // Validar los datos del request
        $request->validate([
            // Validaciones para Pensionista
            'tipo_pensionista_id' => 'required|integer',
            'regimen_pensionario_id' => 'required|integer',
            'fecha_inscripcion' => 'required|date',
            'cussp' => 'required|string|max:255',
            'situacion_e_p_s_id' => 'required|integer',
            'tipo_pago_id' => 'required|integer',
            'tipo_banco_id' => 'required|integer',
            'numero_bancaria' => 'required|string|max:255',
            'monto_pago' => 'required|numeric',
            'periodo_laboral_id' => 'required|integer',
            'derechohabientes' => 'required|string|max:255',
            'remuneracion_pensionista_id' => 'required|integer',
            'sucursal_establecimiento_laboral_id' => 'required|integer',
            // Validaciones para Datos Personales
            'tipo_documento_id' => 'required|integer',
            'numero_documento' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'nombres' => 'required|string|max:255',
            'imagen' => 'nullable|image|max:2048',  // Validación de imagen
            'curriculum' => 'nullable|file|mimes:pdf,doc,docx|max:2048',  // Validación de archivo
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required|string|max:1',
            'nacionalidad_id' => 'required|integer',
            'telefono' => 'required|string|max:255',
            'correo_electronico' => 'required|email|max:255',
            'essalud_vida' => 'required|boolean',
            'domiciliado' => 'required|boolean',
            'via_id' => 'required|integer',
            'nombre_via' => 'required|string|max:255',
            'numero_via' => 'required|string|max:255',
            'interior' => 'nullable|string|max:255',
            'zona_id' => 'required|integer',
            'nombre_zona' => 'required|string|max:255',
            'referencia' => 'nullable|string|max:255',
            'distrito_id' => 'required|integer',
            'trabajador_id' => 'nullable|integer',
            'trabajador_cuarta_categoria_id' => 'nullable|integer',
            'modalidad_formativa_id' => 'nullable|integer',

            // Validación para datos de periodo laboral
            'categoria_periodos_id' => 'required|integer',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date|after_or_equal:fecha_inicio',
            'motivo_fin_id' => 'nullable|integer',

            //Validación para remuneracion      
            'concepto_sunat_id' => 'required|integer',
            'monto_devengado' => 'required|integer',
            'monto_pagado' => 'required|integer',

            

        ]);

        DB::beginTransaction();

        try {
            // Actualizar el pensionista
            $pensionista = Pensionista::findOrFail($id);
            $pensionista->update([
                'tipo_pensionista_id' => $request->input('tipo_pensionista_id'),
                'regimen_pensionario_id' => $request->input('regimen_pensionario_id'),
                'fecha_inscripcion' => $request->input('fecha_inscripcion'),
                'cussp' => $request->input('cussp'),
                'situacion_e_p_s_id' => $request->input('situacion_e_p_s_id'),
                'tipo_pago_id' => $request->input('tipo_pago_id'),
                'tipo_banco_id' => $request->input('tipo_banco_id'),
                'numero_bancaria' => $request->input('numero_bancaria'),
                'monto_pago' => $request->input('monto_pago'),
                'periodo_laboral_id' => $request->input('periodo_laboral_id'),
                'derechohabientes' => $request->input('derechohabientes'),
                'remuneracion_pensionista_id' => $request->input('remuneracion_pensionista_id'),
                'sucursal_establecimiento_laboral_id' => $request->input('sucursal_establecimiento_laboral_id'),
            ]);

            // Manejar la carga de archivos (si existen)
            $imagenPath = $request->file('imagen') ? $request->file('imagen')->store('imagenes', 'public') : $pensionista->datosPersonales->imagen;
            $curriculumPath = $request->file('curriculum') ? $request->file('curriculum')->store('curriculums', 'public') : $pensionista->datosPersonales->curriculum;

            // Actualizar los datos personales asociados
            $datosPersonales = DatosPersonal::where('pensionista_id', $id)->first();
            $datosPersonales->update([
                'tipo_documento_id' => $request->input('tipo_documento_id'),
                'numero_documento' => $request->input('numero_documento'),
                'apellido_paterno' => $request->input('apellido_paterno'),
                'apellido_materno' => $request->input('apellido_materno'),
                'nombres' => $request->input('nombres'),
                'imagen' => $imagenPath,
                'curriculum' => $curriculumPath,
                'fecha_nacimiento' => $request->input('fecha_nacimiento'),
                'sexo' => $request->input('sexo'),
                'nacionalidad_id' => $request->input('nacionalidad_id'),
                'telefono' => $request->input('telefono'),
                'correo_electronico' => $request->input('correo_electronico'),
                'essalud_vida' => $request->input('essalud_vida'),
                'domiciliado' => $request->input('domiciliado'),
                'via_id' => $request->input('via_id'),
                'nombre_via' => $request->input('nombre_via'),
                'numero_via' => $request->input('numero_via'),
                'interior' => $request->input('interior'),
                'zona_id' => $request->input('zona_id'),
                'nombre_zona' => $request->input('nombre_zona'),
                'referencia' => $request->input('referencia'),
                'distrito_id' => $request->input('distrito_id'),
                'trabajador_id' => $request->input('trabajador_id'),
                'trabajador_cuarta_categoria_id' => $request->input('trabajador_cuarta_categoria_id'),
                'modalidad_formativa_id' => $request->input('modalidad_formativa_id'),
            ]);

            // Actualizar el periodo laboral asociado
            $periodoLaboral = PeriodoLaboral::where('pensionista_id', $id)->first();
            $periodoLaboral->update([
                'categoria_periodos_id' => $request->input('categoria_periodos_id'),
                'fecha_inicio' => $request->input('fecha_inicio'),
                'fecha_fin' => $request->input('fecha_fin'),
                'motivo_fin_id' => $request->input('motivo_fin_id'),
            ]);
            // Actualizar la remuneración asociada
            $remuneracionPensionista = RemuneracionPencionista::where('pensionista_id', $id)->first();
            $remuneracionPensionista->update([
                'concepto_sunat_id' => $request->input('concepto_sunat_id'),
                'monto_devengado' => $request->input('monto_devengado'),
                'monto_pagado' => $request->input('monto_pagado'),
            ]);

            DB::commit();

            return redirect()->route('pensionistas.index')->with('success', 'Pensionista, datos personales y periodo laboral actualizados exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors('Error al actualizar el pensionista: ' . $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        /* $pensionista = Pensionista::findOrFail($id);
        $datosPersonales = DatosPersonal::where('pensionista_id', $id)->firstOrFail();

        $datosPersonales->delete();
        $pensionista->delete();

        return redirect()->route('pensionistas.index')->with('success', 'Pensionista y datos personales eliminados exitosamente'); */



        DB::beginTransaction();

        try {
            // Eliminar los datos personales asociados
            $datosPersonales = DatosPersonal::where('pensionista_id', $id)->first();
            $datosPersonales->delete();

            // Eliminar el periodo laboral asociado
            $periodoLaboral = PeriodoLaboral::where('pensionista_id', $id)->first();
            $periodoLaboral->delete();

            // Eliminar el pensionista
            $pensionista = Pensionista::findOrFail($id);
            $pensionista->delete();

            DB::commit();

            return redirect()->route('pensionistas.index')->with('success', 'Pensionista, datos personales y periodo laboral eliminados exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors('Error al eliminar el pensionista: ' . $e->getMessage());
        }
    }
}
