<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresaRequest;
use App\Models\Departamento_Region;
use App\Models\Distrito;
use App\Models\Empresa;
use App\Models\Nacionalidad;
use App\Models\Provincia;
use App\Models\Tipo_moneda;
use App\Models\TipoDocumento;
use App\Models\Via;
use App\Models\Zona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $users=User::all();
        $empresas = Empresa::paginate(5);
        if ($request->ajax()) {
            return response()->json([
                'view' => view('configuracion.empresa.index', compact('empresas'))->render(),
                'url' => route('empresa.index', $request->query())
            ]);
        }
        return view('home')->with([
            'view' => 'configuracion.empresa.index',
            'data' => compact('empresas'),
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

        // le pasamos los roles 
        $tipo_documentos = TipoDocumento::all()->pluck('descripcion', 'id');

        $departamentos = Departamento_Region::all()->pluck('descripcion', 'id');
        $provincias = Provincia::all()->pluck('descripcion', 'id');
        $distritos = Distrito::all()->pluck('descripcion', 'id');
        $zonas = Zona::all()->pluck('descripcion', 'id');
        $vias = Via::all()->pluck('descripcion', 'id');
        $paises = Nacionalidad::all()->pluck('descripcion', 'id');
        $tipo_monedas = Tipo_moneda::all()->pluck('descripcion', 'id'); // Añadir esto
        if ($request->ajax()) {
            if ($request->ajax()) {
                return response()->json([
                    'view' => view('configuracion.empresa.create', compact(
                        'tipo_documentos',
                        'departamentos',
                        'provincias',
                        'distritos',
                        'zonas',
                        'vias',
                        'paises',
                        'tipo_monedas'
                    ))->render(),
                    'url' => route('empresa.create', $request->query())
                ]);
            }
            return view('home')->with([
                'view' => 'configuracion.empresa.index',
                'data' => compact(
                    'tipo_documentos',
                    'departamentos',
                    'provincias',
                    'distritos',
                    'zonas',
                    'vias',
                    'paises',
                    'tipo_monedas'
                ),
            ]);
        }

        return view('home')->with([
            'view' => 'configuracion.empresa.create',
            'data' => compact(
                'tipo_documentos',
                'departamentos',
                'provincias',
                'distritos',
                'zonas',
                'vias',
                'paises',
                'tipo_monedas'
            ),
        ]);
    }


    public function store(EmpresaRequest $request)
    {
        $distrito = Distrito::find($request->distrito_id);
        if (!$distrito) {
            return redirect()->back()->withErrors(['distrito_id' => 'El distrito seleccionado no es válido.'])->withInput();
        }

        $empresa = Empresa::create([
            'codigo_empresa' => $request->codigo_empresa,
            'direccion' => $request->direccion,
            'razon_social' => $request->razon_social,
            'nombre_comercial' => $request->nombre_comercial,
            'ruc_empresa' => $request->ruc_empresa,
            'numero_decreto_supremo' => $request->numero_decreto_supremo,
            'nombre_representante_legal' => $request->nombre_representante_legal,
            'tipo_documento_id' => $request->tipo_documento_id,
            'numero_documento' => $request->numero_documento,
            'email' => $request->email,
            'numero_telefono' => $request->numero_telefono,
            'codigo_ubigeo' => $distrito->codigo,
            'departamento_id' => $request->departamento_id,
            'provincia_id' => $request->provincia_id,
            'distrito_id' => $request->distrito_id,
            'zona_id' => $request->zona_id,
            'via_id' => $request->via_id,
            'pais_id' => $request->pais_id,
            'tipo_moneda_id' => $request->tipo_moneda, // Corrected to tipo_moneda_id
        ]);

        return redirect()->route('empresas.index')->with('success', 'Empresa creada exitosamente.');
    }



    public function show(Empresa $empresa)
    {
        //
    }


    public function edit(Empresa $empresa, Request $request)
    {
        //


        $tipo_documentos = TipoDocumento::all()->pluck('descripcion', 'id');
        $departamentos = Departamento_Region::all()->pluck('descripcion', 'id');
        $provincias = Provincia::all()->pluck('descripcion', 'id');
        $distritos = Distrito::all()->pluck('descripcion', 'id');
        $zonas = Zona::all()->pluck('descripcion', 'id');
        $vias = Via::all()->pluck('descripcion', 'id');
        $paises = Nacionalidad::all()->pluck('descripcion', 'id');
        $tipo_monedas = Tipo_Moneda::all()->pluck('descripcion', 'id');
        if ($request->ajax()) {
            return response()->json([
                'view' => view('configuracion.empresa.edit', compact(
                    'empresa',
                    'tipo_documentos',
                    'departamentos',
                    'provincias',
                    'distritos',
                    'zonas',
                    'vias',
                    'paises',
                    'tipo_monedas'
                ))->render(),
                'url' => route('empresa.edit', $request->query())
            ]);
            
        }

        return view('home')->with([
            'view' => 'configuracion.empresa.edit',
            'data' => compact(
                'empresa',
                'tipo_documentos',
                'departamentos',
                'provincias',
                'distritos',
                'zonas',
                'vias',
                'paises',
                'tipo_monedas'
            ),
        ]);
    }


    public function update(Request $request, Empresa $empresa)
    {
        //
    }

    public function destroy(Empresa $empresa)
    {
        // Eliminar la empresa
        $empresa->delete();

        return redirect()->route('empresas.index')->with('success', 'Empresa eliminada exitosamente.');
    }
}
