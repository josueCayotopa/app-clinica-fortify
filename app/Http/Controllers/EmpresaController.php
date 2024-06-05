<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresaRequest;
use App\Models\Departamento_Region;
use App\Models\Distrito;
use App\Models\Empresa;
use App\Models\Nacionalidad;
use App\Models\Provincia;
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
    public function index()
    {
        //


        // $users=User::all();
        $empresas = Empresa::paginate(10);
        return view('configuracion.empresa.index', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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

        return view('configuracion.empresa.create', compact('tipo_documentos', 'departamentos', 'provincias', 'distritos', 'zonas', 'vias', 'paises'));
    }


    public function store(EmpresaRequest $request)
    {

        

        $distrito = Distrito::find($request->distrito_id);
        if (!$distrito) {
            return redirect()->back()->withErrors(['distrito_id' => 'El distrito seleccionado no es válido.'])->withInput();
        }

        Empresa::create([
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
            
            'departamento_id' => $request->departamentos,
            'provincia_id' => $request->provincias,
            'distrito_id' => $request->distritos,
            'zona_id' => $request->zona_id,
            'via_id' => $request->via_id,
            'pais_id' => $request->pais_id,
            'tipo_moneda' => 1,


        ]);

        return redirect()->route('empresas.index')->with('success', 'Empresa creada exitosamente.');
    }


    public function show(Empresa $empresa)
    {
        //
    }


    public function edit(Empresa $empresa)
    {
        //
    }


    public function update(Request $request, Empresa $empresa)
    {
        //
    }

    public function destroy(Empresa $empresa)
    {
        //
    }
    public function getProvincias(Request $request)
    {
        try {
            $provincias = Provincia::where('departamento_id', $request->departamento_id)->pluck('descripcion', 'id');
            return response()->json($provincias);
        } catch (\Exception $e) {
            // Manejar la excepción aquí
            return response()->json(['error' => 'Error al obtener las provincias'], 500);
        }
    }
    public function getDistritos(Request $request)
    {
        try {
            $distritos = Distrito::where('provincia_id', $request->provincia_id)->pluck('descripcion', 'id');
            return response()->json($distritos);
        } catch (\Exception $e) {
            // Manejar la excepción aquí
            return response()->json(['error' => 'Error al obtener los distritos'], 500);
        }
    }
}
