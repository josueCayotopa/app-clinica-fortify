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

class PensionistaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('user_index'), 403);

        $pensionistas = Pensionista::all();

        if ($request->ajax()) {
            return response()->json([
                'view' => view('pensionistas.index', compact('pensionistas'))->render(),
                'url' => route('pensionistas.index', $request->query())
            ]);
        }
        return view('home')->with([
            'view' => 'pensionistas.index',
            'data' => compact('pensionistas'),
        ]);

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
        $sucursal = Sucursal::all();
        $empresa = Empresa::all();
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
            'categoriaPeriodo',
            'motivoFinPeriodo',
            'conceptoSunat',
            'nacionalidad',
            'departamentos',
            'provincias',
            'distritos',
            'zonas',
            'vias',
            'sucursalEstablecimiento',
            'sucursal',
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
    public function store(Request $request)
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

        $pensionista = Pensionista::create($validatedData);



        return redirect()->route('pensionistas.index')->with('success', 'Pensionista creado exitosamente.');
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
    public function update(Request $request, $id)
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pensionista = Pensionista::findOrFail($id);
        $pensionista->delete();

        return redirect()->route('pensionistas.index')->with('success', 'Pensionista eliminado exitosamente.');
    }
}
