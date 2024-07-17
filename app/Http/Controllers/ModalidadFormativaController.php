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
use App\Models\JornadaLaboral;
use App\Models\ModalidadFormativa;
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
use App\Models\SeguroMedico;
use App\Models\SituacionEPS;
use App\Models\SituacionTrabajador;
use App\Models\Sucursal;
use App\Models\Tipo_trabajador;
use App\Models\TipoBanco;
use App\Models\TipoContratosTrabajo;
use App\Models\TipoDocumento;
use App\Models\TipoPago;
use App\Models\TipoSuspension;
use App\Models\Via;
use App\Models\Zona;
use Illuminate\Http\Request;

class ModalidadFormativaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
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

        // Filtrar solo los que tienen modaliad_formativa_id no nulo
        $query->whereNotNull('modaliad_formativa_id');

        $datosPersonales = $query->paginate(5); // Paginar los resultados

        return view('modalidad_formativa.index', compact('datosPersonales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $seguro_medico = SeguroMedico::pluck('descripcion', 'id');


        return view('modalidad_formativa.create', compact(
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
            'seguro_medico',
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
        // Validar los datos recibidos
        $validatedData = $request->validate([
            // Validaciones para DatosPersonal
            'tipo_documento_id' => 'required|exists:tipo_documentos,id',
            'numero_documento' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'nombres' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'essalud_vida' => 'nullable|in:0,1',
            'sexo' => 'nullable|in:M,F',
            'telefono' => 'nullable|string|max:20',
            'correo_electronico' => 'nullable|email|max:255',

            'image' => 'nullable|image|max:2048',
            'curriculum' => 'nullable|mimes:pdf|max:2048',

            'domiciliado' => 'nullable|boolean',
            'via_id' => 'nullable|integer',
            'nombre_via' => 'nullable|string|max:50',
            'numero_via' => 'nullable|string|max:10',
            'interior' => 'nullable|string|max:10',
            'zona_id' => 'required|exists:zonas,id',
            'nombre_zona' => 'nullable|string|max:50',
            'referencia' => 'nullable|string|max:255',
            'distrito_id' => 'nullable|exists:distritos,id',
            'institucion_id' => 'nullable|integer',
            'prefesion_id' => 'nullable|integer',

            // Validaciones para PeriodoLaboral
            'categoria_periodos_id' => 'required|integer',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date',
            'motivo_fin_id' => 'nullable|integer',

            // Validaciones para JornadaLaboral
            'horas_trabajadas' => 'required|integer',
            'minutos_trabajados' => 'required|integer',
            'horas_sobretiempo' => 'nullable|integer',
            'minutos_sobretiempo' => 'nullable|integer',
            'descripcion' => 'nullable|string|max:255',
            'numero_dias_semana' => 'required|integer',
            'hora_ingreso' => 'required|date_format:H:i:s',
            'hora_salida' => 'required|date_format:H:i:s',

            // Validaciones para ModalidadFormativa
            'seguro_medico_id' => 'nullable|integer',
            'nivel_educativo_id' => 'nullable|integer',
            'ocupacion_id' => 'nullable|integer',
            'madre_responsabilidad' => 'nullable|boolean',
            'discapacidad' => 'nullable|boolean',
            'institucion_id' => 'nullable|integer',
            'horario_nocturno' => 'nullable|boolean',
            'tipo_pago_id' => 'nullable|integer',
            'tipo_banco_id' => 'nullable|integer',
            'numero_bancaria' => 'nullable|string|max:20',
            'monto_pago' => 'nullable|numeric',
            'dias_subcidiado_id' => 'nullable|integer',
            'dias_no_subcidiado_id' => 'nullable|integer',
            'sucursal_establecimiento_laboral_id' => 'nullable|integer',
        ]);

        // Crear PeriodoLaboral
        $periodoLaboral = PeriodoLaboral::create([
            'categoria_periodos_id' => $validatedData['categoria_periodos_id'],
            'fecha_inicio' => $validatedData['fecha_inicio'],
            'fecha_fin' => $validatedData['fecha_fin'],
            'motivo_fin_id' => $validatedData['motivo_fin_id'],
        ]);

        // Crear JornadaLaboral
        $jornadaLaboral = JornadaLaboral::create([
            'horas_trabajadas' => $validatedData['horas_trabajadas'],
            'minutos_trabajados' => $validatedData['minutos_trabajados'],
            'horas_sobretiempo' => $validatedData['horas_sobretiempo'],
            'minutos_sobretiempo' => $validatedData['minutos_sobretiempo'],
            'descripcion' => $validatedData['descripcion'],
            'numero_dias_semana' => $validatedData['numero_dias_semana'],
            'hora_ingreso' => $validatedData['hora_ingreso'],
            'hora_salida' => $validatedData['hora_salida'],
        ]);

        // Crear ModalidadFormativa
        $modalidadFormativa = ModalidadFormativa::create([
            'seguro_medico_id' => $validatedData['seguro_medico_id'],
            'nivel_educativo_id' => $validatedData['nivel_educativo_id'],
            'ocupacion_id' => $validatedData['ocupacion_id'],
            'madre_responsabilidad' => $validatedData['madre_responsabilidad'],
            'discapacidad' => $validatedData['discapacidad'],
            'institucion_id' => $validatedData['institucion_id'],
            'horario_nocturno' => $validatedData['horario_nocturno'],
            'tipo_pago_id' => $validatedData['tipo_pago_id'],
            'tipo_banco_id' => $validatedData['tipo_banco_id'],
            'numero_bancaria' => $validatedData['numero_bancaria'],
            'monto_pago' => $validatedData['monto_pago'],
            'periodo_laboral_id' => $periodoLaboral->id,
            'jornada_laboral_id' => $jornadaLaboral->id,
            'sucursal_establecimiento_laboral_id' => $validatedData['sucursal_establecimiento_laboral_id'],
        ]);

        $datosPersonal = new DatosPersonal();
        $datosPersonal->tipo_documento_id = $request->tipo_documento_id;
        $datosPersonal->numero_documento = $request->numero_documento;
        $datosPersonal->apellido_paterno = $request->apellido_paterno;
        $datosPersonal->apellido_materno = $request->apellido_materno;
        $datosPersonal->nombres = $request->nombres;
        $datosPersonal->fecha_nacimiento = $request->fecha_nacimiento;
        $datosPersonal->sexo = $request->sexo;
        $datosPersonal->telefono = $request->telefono;
        $datosPersonal->correo_electronico = $request->correo_electronico;
        $datosPersonal->essalud_vida = $request->input('essalud_vida', 0); // Por defecto, si no se envía, será 0

        // Asignar datos de domicilio si está marcado como domiciliado
        if ($request->has('domiciliado')) {
            $datosPersonal->domiciliado = true;
            $datosPersonal->nacionalidad_id = $request->nacionalidad_id;
            $datosPersonal->departamento_id = $request->departamento_id;
            $datosPersonal->provincia_id = $request->provincia_id;
            $datosPersonal->distrito_id = $request->distrito_id;
            $datosPersonal->via_id = $request->via_id;
            $datosPersonal->nombre_via = $request->nombre_via;
            $datosPersonal->numero_via = $request->numero_via;
            $datosPersonal->interior = $request->interior;
            $datosPersonal->zona_id = $request->zona_id;
            $datosPersonal->referencia = $request->referencia;
        } else {
            $datosPersonal->domiciliado = false;
            // Limpiar campos de domicilio si no está marcado como domiciliado
            $datosPersonal->nacionalidad_id = null;
            $datosPersonal->departamento_id = null;
            $datosPersonal->provincia_id = null;
            $datosPersonal->distrito_id = null;
            $datosPersonal->via_id = null;
            $datosPersonal->nombre_via = null;
            $datosPersonal->numero_via = null;
            $datosPersonal->interior = null;
            $datosPersonal->zona_id = null;
            $datosPersonal->referencia = null;
        }

        // Manejo de imagen
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $datosPersonal->imagen = basename($imagePath);
        }

        // Manejo de curriculum
        if ($request->hasFile('curriculum')) {
            $curriculumPath = $request->file('curriculum')->store('public/curriculums');
            $datosPersonal->curriculum = basename($curriculumPath);
        }
        $datosPersonal->modalidad_formativa = $modalidadFormativa->id;
        // Guardar el registro
        $datosPersonal->save();

        // Redireccionar con mensaje de éxito
        return redirect()->route('datos_personales.index')
            ->with('success', 'Datos personales registrados correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ModalidadFormativa  $modalidadFormativa
     * @return \Illuminate\Http\Response
     */
    public function show(ModalidadFormativa $modalidadFormativa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ModalidadFormativa  $modalidadFormativa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $modalidadFormativa = DatosPersonal::findOrFail($id);
        //
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
        $seguro_medico = SeguroMedico::pluck('descripcion', 'id');


        return view('modalidad_formativa.create', compact(
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
            'seguro_medico',
            'modalidadFormativa',
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ModalidadFormativa  $modalidadFormativa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModalidadFormativa $modalidadFormativa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ModalidadFormativa  $modalidadFormativa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modalidadFormativa = ModalidadFormativa::findOrFail($id);

        // Verificar si existe una relación con DatosPersonal y ModalidadFormativa
        if ($modalidadFormativa->datosPersonal && $modalidadFormativa->datosPersonal->modalidad_formativa) {
            $periodoLaboral = $modalidadFormativa->datosPersonal->modalidad_formativa->periodoLaboral;

            if ($periodoLaboral) {
                // Cambiar el estado a desactivado (por ejemplo)
                $periodoLaboral->update(['estado' => false]); // Ajusta esto según tu lógica de estado
            }
        }

        // Redirigir con mensaje de éxito
        return redirect()->route('modalidad_formativa.index')
            ->with('success', 'Estado del periodo laboral cambiado exitosamente.');
    }
}
