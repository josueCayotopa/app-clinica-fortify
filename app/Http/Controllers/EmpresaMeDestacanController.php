<?php

namespace App\Http\Controllers;

use App\Models\DatosPersonal;
use App\Models\EmpresaMeDestacan;
use App\Models\Tipo_de_Actividad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EmpresaMeDestacanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('user_index'), 403);

        $empresaDest = EmpresaMeDestacan::all();

        if ($request->ajax()) {
            return response()->json([
                'view' => view('destacan.index', compact('empresaDest'))->render(),
                'url' => route('destacan.index', $request->query())
            ]);
        }
        return view('home')->with([
            'view' => 'destacan.index',
            'data' => compact('empresaDest'),
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tipo_actividad = Tipo_de_Actividad::all();

        if ($request->ajax()) {
            return response()->json([
                'view' => view('destacan.create', compact('tipo_actividad'))->render(),
                'url' => route('destacan.create', $request->query())
            ]);
        }

        return view('home')->with([
            'view' => 'destacan.create',
            'data' => compact('tipo_actividad'),
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
        $request->validate([
            'razon_social' => 'required',
            'direccion' => 'required',
            'nombre_comercial' => 'required',
            'ruc_empresa' => 'required',
            'codigo_actividad_id' => 'required|exists:tipo_de_actividad,id',
        ]);
    
        $empresasD = EmpresaMeDestacan::create([
            'razon_social' => $request->razon_social,
            'direccion' => $request->direccion,
            'nombre_comercial' => $request->nombre_comercial,
            'ruc_empresa' => $request->ruc_empresa,
            'codigo_actividad_id' => $request->codigo_actividad_id,
        ]);
    
        return redirect()->route('destacan.index')->with('success', 'Empresa creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmpresaMeDestacan  $empresaMeDestacan
     * @return \Illuminate\Http\Response
     */
    public function show(EmpresaMeDestacan $empresaMeDestacan)
    {
        return view('destacan.show', compact('empresaMeDestacan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmpresaMeDestacan  $empresaMeDestacan
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {

        $empresaDest = EmpresaMeDestacan::findOrFail($id);
        if ($request->ajax()) {
            return response()->json([
                'view' => view('destacan.edit', compact('empresaDest'))->render(),
                'url' => route('destacan.edit', $request->query())
            ]);
        }
        return view('home')->with([
            'view' => 'destacan.edit',
            'data' => compact('empresaDest'),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmpresaMeDestacan  $empresaMeDestacan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmpresaMeDestacan $empresaMeDestacan)
    {
        $request->validate([
            'razon_social' => 'required',
            'direccion' => 'required',
            'nombre_comercial' => 'required',
            'ruc_empresa' => 'required',
            'codigo_actividad_id' => 'required|integer',
        ]);

        $empresaMeDestacan->update($request->all());
        return redirect()->route('destacan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmpresaMeDestacan  $empresaMeDestacan
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmpresaMeDestacan $empresaMeDestacan)
    {
        $empresaMeDestacan->delete();
        return redirect()->route('destacan.index');
    }
}
