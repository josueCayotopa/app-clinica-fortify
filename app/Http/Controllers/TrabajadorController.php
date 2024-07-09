<?php

namespace App\Http\Controllers;

use App\Models\CategoriaCargo;
use App\Models\CategoriaOcupacional;
use App\Models\CategoriaPeriodo;
use App\Models\ConceptoSunat;
use App\Models\Convenio;
use App\Models\DatosPersonal;
use App\Models\Departamento_Region;
use App\Models\Distrito;
use App\Models\Empresa;
use App\Models\EmpresaMeDestacan;
use App\Models\EPS;
use App\Models\MotivoFinPeriodo;
use App\Models\Nacionalidad;
use App\Models\Nivel_educativo;
use App\Models\Ocupacion;
use App\Models\Periodicidad;
use App\Models\Provincia;
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
        $situacioneps=SituacionEPS::pluck('descripcion', 'id');
        $situacionTrabajador = SituacionTrabajador::pluck('descripcion', 'id');
        $tipoPago = TipoPago::pluck('descripcion', 'id');
        $tipoBanco = TipoBanco::pluck('descripcion', 'id');
        $categoriaOcupacional = CategoriaOcupacional::pluck('descripcion', 'id');
        $convenio = Convenio::pluck('descripcion', 'id');
        $categoriaPeriodo = CategoriaPeriodo::pluck('descripcion', 'id');
        $motivoFinPeriodo = MotivoFinPeriodo::pluck('descripcion', 'id');
        $tipoSuspension = TipoSuspension::pluck('descripcion', 'id');
     
        $sucursales = Sucursal::pluck('nombre_sucursal', 'id');
        $empresaMeDestacan = EmpresaMeDestacan::pluck('razon_social', 'id');
        $conceptoSunat = ConceptoSunat::pluck('descripcion', 'id');
        $empresas = Empresa::pluck('razon_social', 'id');

        if ($request->ajax()) {
            return response()->json([
                'view' => view('trabajadores.create', compact(
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
                 

                ))->render(),
                'url' => route('trabajadores.create', $request->query())
            ]);
        }

        return view('home')->with([
            'view' => 'trabajadores.create',
            'data' => compact(
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
            
            ),
        ]);




        if ($request->ajax()) {
            return response()->json([
                'view' => view('trabajadores.create', compact('departamentos'))->render(),
                'url' => route('trabajadores.create', $request->query())
            ]);
        }

        return view('home')->with([
            'view' => 'trabajadores.create',
            'data' => compact('departamentos'),
        ]);
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
