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
use Illuminate\Support\Facades\DB;

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
            'domiciliado' => 'nullable|in:0,1',
            'via_id' => 'nullable|integer',
            'nombre_via' => 'nullable|string|max:50',
            'numero_via' => 'nullable|string|max:10',
            'interior' => 'nullable|string|max:50',
            'zona_id' => 'nullable|exists:zonas,id',
            'nombre_zona' => 'nullable|string|max:50',
            'referencia' => 'nullable|string|max:255',
            'departamento_id' => 'required|exists:departamento__regions,id',
            'provincia_id' => 'required|exists:provincias,id',
            'distrito_id' => 'required|exists:distritos,id',
            'institucion_id' => 'nullable|exists:institucions,id',
            'prefesion_id' => 'nullable|exists:profesions,id',

            // Validaciones para PeriodoLaboral
            'categoria_periodos_id' => 'required|exists:categoria_periodos,id',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date',
            'motivo_fin_id' => 'nullable|exists:motivo_fin_periodos,id',

            // Validaciones para JornadaLaboral
            'horas_trabajadas' => 'required|integer',
            'minutos_trabajados' => 'required|integer',
            'horas_sobretiempo' => 'nullable|integer',
            'minutos_sobretiempo' => 'nullable|integer',
            'descripcion' => 'nullable|string|max:255',
            'numero_dias_semana' => 'required|integer',
            'hora_ingreso' => 'nullable|date_format:H:i',
            'hora_salida' => 'nullable|date_format:H:i',

            // Validaciones para ModalidadFormativa
            'seguro_medico_id' => 'nullable|exists:seguro_medicos,id',
            'nivel_educativo_id' => 'nullable|exists:nivel_educativos,id',
            'ocupacion_id' => 'nullable|exists:ocupacions,id',
            'madre_responsabilidad' => 'nullable|in:0,1',
            'discapacidad' => 'nullable|in:0,1',
            'institucion_id' => 'nullable|exists:institucions,id',
            'horario_nocturno' => 'nullable|in:0,1',
            'tipo_pago_id' => 'nullable|exists:tipo_pagos,id',
            'tipo_banco_id' => 'nullable|exists:tipo_bancos,id',
            'numero_bancaria' => 'nullable|string|max:20',
            'monto_pago' => 'nullable|numeric',
            'sucursal_establecimiento_laboral_id' => 'nullable|exists:sucursal_establecimiento_laborals,id',
        ]);

        DB::beginTransaction();

        try {
            // Crear PeriodoLaboral
            $periodoLaboral = PeriodoLaboral::create([
                'categoria_periodos_id' => $validatedData['categoria_periodos_id'],
                'fecha_inicio' => $validatedData['fecha_inicio'],
                'fecha_fin' => $validatedData['fecha_fin'] ?? null,
                'motivo_fin_id' => $validatedData['motivo_fin_id'] ?? null,
            ]);

            // Crear JornadaLaboral
            $jornadaLaboral = JornadaLaboral::create([
                'horas_trabajadas' => $validatedData['horas_trabajadas'],
                'minutos_trabajados' => $validatedData['minutos_trabajados'],
                'horas_sobretiempo' => $validatedData['horas_sobretiempo'] ?? null,
                'minutos_sobretiempo' => $validatedData['minutos_sobretiempo'] ?? null,
                'descripcion' => $validatedData['descripcion'] ?? null,
                'numero_dias_semana' => $validatedData['numero_dias_semana'],
                'hora_ingreso' => $validatedData['hora_ingreso'] ?? null,
                'hora_salida' => $validatedData['hora_salida'] ?? null,
            ]);

            // Crear ModalidadFormativa
            $modalidadFormativa = ModalidadFormativa::create([
                'seguro_medico_id' => $validatedData['seguro_medico_id'] ?? null,
                'nivel_educativo_id' => $validatedData['nivel_educativo_id'] ?? null,
                'ocupacion_id' => $validatedData['ocupacion_id'] ?? null,
                'madre_responsabilidad' => $validatedData['madre_responsabilidad'] ?? null,
                'discapacidad' => $validatedData['discapacidad'] ?? null,
                'institucion_id' => $validatedData['institucion_id'] ?? null,
                'horario_nocturno' => $validatedData['horario_nocturno'] ?? null,
                'tipo_pago_id' => $validatedData['tipo_pago_id'] ?? null,
                'tipo_banco_id' => $validatedData['tipo_banco_id'] ?? null,
                'numero_bancaria' => $validatedData['numero_bancaria'] ?? null,
                'monto_pago' => $validatedData['monto_pago'] ?? null,
                'periodo_laboral_id' => $periodoLaboral->id,
                'jornada_laboral_id' => $jornadaLaboral->id,
                'sucursal_establecimiento_laboral_id' => $validatedData['sucursal_establecimiento_laboral_id'] ?? null,
            ]);

            // Crear DatosPersonal
            $datosPersonal = new DatosPersonal();
            $datosPersonal->tipo_documento_id = $validatedData['tipo_documento_id'];
            $datosPersonal->numero_documento = $validatedData['numero_documento'];
            $datosPersonal->apellido_paterno = $validatedData['apellido_paterno'];
            $datosPersonal->apellido_materno = $validatedData['apellido_materno'];
            $datosPersonal->nombres = $validatedData['nombres'];
            $datosPersonal->fecha_nacimiento = $validatedData['fecha_nacimiento'];
            $datosPersonal->sexo = $validatedData['sexo'] ?? null;
            $datosPersonal->telefono = $validatedData['telefono'] ?? null;
            $datosPersonal->correo_electronico = $validatedData['correo_electronico'] ?? null;
            $datosPersonal->essalud_vida = $validatedData['essalud_vida'] ?? 0;

            if ($request->has('domiciliado')) {
                $datosPersonal->domiciliado = true;
                $datosPersonal->nacionalidad_id = $validatedData['nacionalidad_id'] ?? null;
           
       
                $datosPersonal->distrito_id = $validatedData['distrito_id'] ?? null;
                $datosPersonal->via_id = $validatedData['via_id'] ?? null;
                $datosPersonal->nombre_via = $validatedData['nombre_via'] ?? null;
                $datosPersonal->numero_via = $validatedData['numero_via'] ?? null;
                $datosPersonal->interior = $validatedData['interior'] ?? null;
                $datosPersonal->zona_id = $validatedData['zona_id'] ?? null;
                $datosPersonal->referencia = $validatedData['referencia'] ?? null;
            } else {
                $datosPersonal->domiciliado = false;
            }

            // Manejo de imagen


            // Manejo de imagen
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('public/images');
                $datosPersonal->imagen = basename($imagePath);
            }
            // Manejo de imagen
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('public/images');
                $datosPersonal->image = basename($imagePath);
            }

            // Manejo de curriculum
            if ($request->hasFile('curriculum')) {
                $curriculumPath = $request->file('curriculum')->store('public/curriculums');
                $datosPersonal->curriculum = basename($curriculumPath);
            }
            $datosPersonal->modalid_formativa_id = $modalidadFormativa->id;

            // Guardar datos personales
            $datosPersonal->save();

            DB::commit();

            return redirect()->route('modalidad_formativa.index')->with('success', 'Registro guardado exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Hubo un error al guardar el registro: ' . $e->getMessage());
        }
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
