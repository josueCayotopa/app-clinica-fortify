<?php

namespace App\Http\Controllers;

use App\Models\AfpDescuentosPensiones;
use App\Models\CategoriaCargo;
use App\Models\CategoriaOcupacional;
use App\Models\CategoriaPeriodo;
use App\Models\ConceptoSunat;
use App\Models\Convenio;
use App\Models\DatosPersonal;
use App\Models\Departamento_Region;
use App\Models\DescuentoRegimemPencionario;
use App\Models\Distrito;
use App\Models\Empresa;
use App\Models\EmpresaMeDestacan;
use App\Models\EPS;
use App\Models\Institucion;
use App\Models\MotivoFinPeriodo;
use App\Models\Nacionalidad;
use App\Models\Nivel_educativo;
use App\Models\Ocupacion;
use App\Models\Periodicidad;
use App\Models\PeriodoLaboral;
use App\Models\Profesion;
use App\Models\Provincia;
use App\Models\RegimenAfp;
use App\Models\RegimenPencionario;
use App\Models\SCTRPension;
use App\Models\SCTRSalud;
use App\Models\SituacionEPS;
use App\Models\SituacionTrabajador;
use App\Models\Sucursal;
use App\Models\Tipo_trabajador;
use App\Models\TipoBanco;
use App\Models\TipoContratosTrabajo;
use App\Models\TipoDocumento;
use App\Models\TipoPago;
use App\Models\TipoSuspension;
use App\Models\Trabajador;
use App\Models\Via;
use App\Models\Zona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TrabajadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
                'view' => view('trabajadores.index', compact('datosPersonales'))->render(),
                'url' => route('trabajadores.index', $request->query())
            ]);
        }

        return view('home')->with([
            'view' => 'trabajadores.index',
            'data' => compact('datosPersonales'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        abort_if(Gate::denies('user_create'), 403);

        $departamentos = Departamento_Region::pluck('descripcion', 'id');
        $provincias = Provincia::pluck('descripcion', 'id');
        $distritos = Distrito::pluck('descripcion', 'id');
        $zonas = Zona::pluck('descripcion', 'id');
        $vias = Via::pluck('descripcion', 'id');
        $tipoDocumento = TipoDocumento::pluck('descripcion', 'id');
        $nacionalidad = Nacionalidad::pluck('descripcion', 'id');
        $tipo_trabajadores = Tipo_trabajador::pluck('descripcion', 'id');
        $nivel_educativo = Nivel_educativo::pluck('descripcion', 'id');
        $ocupacion = Ocupacion::pluck('descripcion', 'id');
        $categoriaCargo = CategoriaCargo::pluck('descripcion', 'id');
        $regimenPencionario = RegimenPencionario::pluck('descripcion', 'id');
        $sctrsalud = SCTRSalud::pluck('descripcion', 'id');
        $sctrpension = SCTRPension::pluck('descripcion', 'id');
        $tipoContratosTrabajo = TipoContratosTrabajo::pluck('descripcion', 'id');
        $periodicidad = Periodicidad::pluck('descripcion', 'id');
        $eps = EPS::pluck('descripcion', 'id');
        $situacioneps = SituacionEPS::pluck('descripcion', 'id');
        $situacionTrabajador = SituacionTrabajador::pluck('descripcion', 'id');
        $tipoPago = TipoPago::pluck('descripcion', 'id');
        $tipoBanco = TipoBanco::pluck('descripcion', 'id');
        $categoriaOcupacional = CategoriaOcupacional::pluck('descripcion', 'id');
        $convenio = Convenio::pluck('descripcion', 'id');
        $categoriaPeriodo = CategoriaPeriodo::pluck('descripcion', 'id');
        $motivoFinPeriodo = MotivoFinPeriodo::pluck('descripcion', 'id');
        $tipoSuspension = TipoSuspension::whereIn('id', [10, 11])->pluck('descripcion', 'id');
        $instituciones = Institucion::pluck('nombre', 'id');
        $profeciones = Profesion::pluck('nombre', 'id');
        $sucursales = Sucursal::pluck('nombre_sucursal', 'id');
        $empresaMeDestacan = EmpresaMeDestacan::pluck('razon_social', 'id');
        $conceptoSunat = ConceptoSunat::pluck('descripcion', 'id');
        $empresas = Empresa::pluck('razon_social', 'id');
        $afpregimen = RegimenAfp::pluck('nombre', 'id');
        $tipo_descuentos = DescuentoRegimemPencionario::pluck('descripcion', 'id');
        $afpdescuento = AfpDescuentosPensiones::pluck('tipo_comision', 'id');


        return view('trabajadores.create', compact(
            'departamentos',
            'provincias',
            'distritos',
            'zonas',
            'vias',
            'tipoDocumento',
            'nacionalidad',
            'tipo_trabajadores',
            'nivel_educativo',
            'ocupacion',
            'categoriaCargo',
            'regimenPencionario',
            'sctrsalud',
            'sctrpension',
            'tipoContratosTrabajo',
            'periodicidad',
            'eps',
            'situacioneps',
            'situacionTrabajador',
            'tipoPago',
            'tipoBanco',
            'categoriaOcupacional',
            'convenio',
            'categoriaPeriodo',
            'motivoFinPeriodo',
            'tipoSuspension',
            'sucursales',
            'empresas',
            'empresaMeDestacan',
            'conceptoSunat',
            'profeciones',
            'instituciones',
            'afpregimen',
            'tipo_descuentos',
            'afpdescuento',
        ));
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
        // Validación de los datos de entrada
        // Validación de los datos de entrada para Trabajador y DatosPersonal
        $request->validate([


            // periodo laboral 
            'categoria_periodos_id' => 'nullable|exists:categoria_periodos,id',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'motivo_fin_id' => 'required|exists:motivo_fin_periodos,id',
            // jornada laboral 
            'horas_trabajadas' => 'nullable|integer',
            'minutos_trabajados' => 'nullable|integer',
            'horas_sobretiempo' => 'nullable|integer',
            'minutos_sobretiempo' => 'nullable|integer',
            'descripcion' => 'nullable|string|max:255',
            'numero_dias_semana' => 'nullable|integer',
            'hora_ingreso' => 'nullable|date_format:H:i',
            'hora_salida' => 'nullable|date_format:H:i',

            // trabajador
            'tipo_trabajador_id' => 'required|exists:tipo_trabajadors,id',
            'regimen_laboral' => 'required|string|max:255',
            'nivel_edicativo_id' => 'required|exists:nivel_educativos,id',
            'ocupacion_id' => 'required|exists:ocupacions,id',
            'categoria_cargo_id' => 'required|exists:categoria_cargos,id',
            'discapacidad' => 'nullable|boolean',
            'regimen_pencionario_id' => 'required|exists:regimen_pencionarios,id',
            'fecha_inscripcion_regimen' => 'required|date',
            'CUSPP' => 'nullable|string|max:20',
            'sctrsalud_id' => 'nullable|exists:sctrsaluds,id',
            'sctrpension_id' => 'nullable|exists:sctrpensions,id',
            'contrato_trabajo_id' => 'required|exists:tipo_contratos_trabajos,id',
            'trabajo_sujeto_alt_acum_atip_desc' => 'nullable|boolean',
            'trabajo_sujeto_jornda_maxima' => 'nullable|boolean',
            'trabajo_sujeto_horario_noctur' => 'nullable|boolean',
            'ingresos_quinta_categoria' => 'nullable|boolean',
            'sindicalizado' => 'nullable|boolean',
            'periodicidad_id' => 'nullable|exists:periodicidads,id',
            'afiliado_eps_servicios_propios' => 'nullable|boolean',
            'eps_id' => 'nullable|exists:eps,id',
            'situacion_id' => 'nullable|exists:situacion_e_p_s,id',
            'renta_quinta_categoria' => 'nullable|boolean',
            'situacion_trabajador_id' => 'nullable|exists:situacion_trabajadors,id',
            'tipo_pago_id' => 'nullable|exists:tipo_pagos,id',
            'tipo_banco_id' => 'nullable|exists:tipo_bancos,id',
            'numero_bancaria' => 'nullable|string|max:20',
            'monto_pago' => 'nullable|numeric',
            'afilacion_asegura_pension' => 'nullable|boolean',
            'categoria_ocupacional_id' => 'nullable|exists:categoria_ocupacionals,id',
            'convenio_id' => 'nullable|exists:convenios,id',
            'periodo_laboral_id' => 'nullable|exists:periodo_laborals,id',
            'otros_empleadores' => 'nullable|boolean',
            'derechohabientes' => 'nullable|boolean',
            'jornada_laboral_id' => 'nullable|exists:jornada_laborals,id',
            'dias_subcidiado_id' => 'nullable|exists:dias_subcidiados,id',
            'dias_no_subcidiado_id' => 'nullable|exists:dias_no_subcidiados,id',
            'sucursal_establecimiento_laboral_id' => 'nullable|exists:sucursal_establecimiento_laborals,id',
            'remuneracion_id' => 'nullable|exists:remuneracions,id',

            // DatosPersonales validation rules
            'tipo_documento_id' => 'required|exists:tipo_documentos,id',
            'numero_documento' => 'required|string|max:20',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'nombres' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required|string|max:1',
            'nacionalidad_id' => 'required|exists:nacionalidads,id',
            'telefono' => 'nullable|string|max:20',
            'correo_electronico' => 'nullable|string|email|max:255',
            'imagen' => 'nullable|string|max:255',
            'curriculum' => 'nullable|string|max:255',
            'essalud_vida' => 'nullable|boolean',
            'domiciliado' => 'nullable|boolean',
            'via_id' => 'nullable|exists:vias,id',
            'nombre_via' => 'nullable|string|max:255',
            'numero_via' => 'nullable|string|max:255',
            'interior' => 'nullable|string|max:255',
            'zona_id' => 'nullable|exists:zonas,id',
            'nombre_zona' => 'nullable|string|max:255',
            'referencia' => 'nullable|string|max:255',
            'distrito_id' => 'nullable|exists:distritos,id',
            'institucion_id' => 'nullable|exists:instituciones,id',
            'prefesion_id' => 'nullable|exists:profesiones,id',
        ]);

        // periodo laboral 
        PeriodoLaboral::create([
            'categoria_periodos_id' => $request->input('categoria_periodos_id'),
            'fecha_inicio' => $request->input('fecha_inicio'),
            'fecha_fin' => $request->input('fecha_fin'),
            'motivo_fin_id' => $request->input('motivo_fin_id'),
        ]);

        // Guardar el nuevo registro en la base de datos
        // Creación y almacenamiento de Trabajador
        $trabajador = new Trabajador();
        $trabajador->tipo_trabajador_id = $request->tipo_trabajador_id;
        $trabajador->regimen_laboral = $request->regimen_laboral;
        $trabajador->nivel_edicativo_id = $request->nivel_edicativo_id;
        $trabajador->ocupacion_id = $request->ocupacion_id;
        $trabajador->categoria_cargo_id = $request->categoria_cargo_id;
        $trabajador->discapacidad = $request->discapacidad;
        $trabajador->regimen_pencionario_id = $request->regimen_pencionario_id;
        $trabajador->fecha_inscripcion_regimen = $request->fecha_inscripcion_regimen;
        $trabajador->CUSPP = $request->CUSPP;
        $trabajador->sctrsalud_id = $request->sctrsalud_id;
        $trabajador->sctrpension_id = $request->sctrpension_id;
        $trabajador->contrato_trabajo_id = $request->contrato_trabajo_id;
        $trabajador->trabajo_sujeto_alt_acum_atip_desc = $request->trabajo_sujeto_alt_acum_atip_desc;
        $trabajador->trabajo_sujeto_jornda_maxima = $request->trabajo_sujeto_jornda_maxima;
        $trabajador->trabajo_sujeto_horario_noctur = $request->trabajo_sujeto_horario_noctur;
        $trabajador->ingresos_quinta_categoria = $request->ingresos_quinta_categoria;
        $trabajador->sindicalizado = $request->sindicalizado;
        $trabajador->periodicidad_id = $request->periodicidad_id;
        $trabajador->afiliado_eps_servicios_propios = $request->afiliado_eps_servicios_propios;
        $trabajador->eps_id = $request->eps_id;
        $trabajador->situacion_id = $request->situacion_id;
        $trabajador->renta_quinta_categoria = $request->renta_quinta_categoria;
        $trabajador->situacion_trabajador_id = $request->situacion_trabajador_id;
        $trabajador->tipo_pago_id = $request->tipo_pago_id;
        $trabajador->tipo_banco_id = $request->tipo_banco_id;
        $trabajador->numero_bancaria = $request->numero_bancaria;
        $trabajador->monto_pago = $request->monto_pago;
        $trabajador->afilacion_asegura_pension = $request->afilacion_asegura_pension;
        $trabajador->categoria_ocupacional_id = $request->categoria_ocupacional_id;
        $trabajador->convenio_id = $request->convenio_id;
        $trabajador->periodo_laboral_id = $request->periodo_laboral_id;
        $trabajador->otros_empleadores = $request->otros_empleadores;
        $trabajador->derechohabientes = $request->derechohabientes;
        $trabajador->jornada_laboral_id = $request->jornada_laboral_id;
        $trabajador->dias_subcidiado_id = $request->dias_subcidiado_id;
        $trabajador->dias_no_subcidiado_id = $request->dias_no_subcidiado_id;
        $trabajador->sucursal_establecimiento_laboral_id = $request->sucursal_establecimiento_laboral_id;
        $trabajador->remuneracion_id = $request->remuneracion_id;




        // Creación y almacenamiento de DatosPersonales
        // Creación de un nuevo objeto DatosPersonal con los datos validados
        $datosPersonal = new DatosPersonal();

        // Manejo del archivo de imagen
        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('imagenes');
            $datosPersonal->imagen = $path;
        }

        // Manejo del archivo de curriculum
        if ($request->hasFile('curriculum')) {
            $path = $request->file('curriculum')->store('curriculums');
            $datosPersonal->curriculum = $path;
        }

        $datosPersonal->tipo_documento_id = $request->tipo_documento_id;
        $datosPersonal->numero_documento = $request->numero_documento;
        $datosPersonal->apellido_paterno = $request->apellido_paterno;
        $datosPersonal->apellido_materno = $request->apellido_materno;
        $datosPersonal->nombres = $request->nombres;
        $datosPersonal->fecha_nacimiento = $request->fecha_nacimiento;
        $datosPersonal->sexo = $request->sexo;
        $datosPersonal->nacionalidad_id = $request->nacionalidad_id;
        $datosPersonal->telefono = $request->telefono;
        $datosPersonal->correo_electronico = $request->correo_electronico;
        $datosPersonal->imagen = $request->imagen;
        $datosPersonal->curriculum = $request->curriculum;
        $datosPersonal->essalud_vida = $request->essalud_vida;
        $datosPersonal->domiciliado = $request->domiciliado;
        $datosPersonal->via_id = $request->via_id;
        $datosPersonal->nombre_via = $request->nombre_via;
        $datosPersonal->numero_via = $request->numero_via;
        $datosPersonal->interior = $request->interior;
        $datosPersonal->zona_id = $request->zona_id;
        $datosPersonal->nombre_zona = $request->nombre_zona;
        $datosPersonal->referencia = $request->referencia;
        $datosPersonal->distrito_id = $request->distrito_id;
        $datosPersonal->institucion_id = $request->institucion_id;
        $datosPersonal->prefesion_id = $request->prefesion_id;
        $datosPersonal->save();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trabajador  $trabajador
     * @return \Illuminate\Http\Response
     */
    public function show(Trabajador $trabajador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trabajador  $trabajador
     * @return \Illuminate\Http\Response
     */
    public function edit(Trabajador $trabajador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trabajador  $trabajador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trabajador $trabajador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trabajador  $trabajador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trabajador $trabajador)
    {
        //
    }
}
