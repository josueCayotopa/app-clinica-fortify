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
        
        $query = EmpresaMeDestacan::query();
        $empresaDest = $query->paginate(10);

        if ($request->ajax()) {
            return response()->json([
                'view' => view('empresasD.index', compact('empresaDest'))->render(),
                'url' => route('empresasD.index', $request->query())
            ]);
        }
        return view('home')->with([
            'view' => 'empresasD.index',
            'data' => compact('empresaDest'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tipo_actividad = Tipo_de_Actividad::all()->pluck('descripcion','id');

        if ($request->ajax()) {
            if ($request->ajax()) {
                return response()->json([
                    'view' => view('empresasD.create', compact('tipo_actividad'))->render(),
                    'url' => route('empresasD.create', $request->query())
                ]);
            }
    
            return view('home')->with([
                'view' => 'empresasD.create',
                'data' => compact('tipo_actividad'),
            ]);
        }
        return view('home')->with([
            'view' => 'empresasD.create',
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
        /* $request->validate([
            'razon_social' => 'required|string|min:3|max:255',
            'direccion' => 'required|string|min:3|max:255',
            'nombre_comercial' => 'required|string|min:3|max:255',
            'ruc_empresa' => 'required|string|min:8|max:8',
            'codigo_actividad_id' => 'required|exists:tipo_de_actividad,id',
        ]); */
    
        /* $empresasD = EmpresaMeDestacan::create([
            'razon_social' => $request->razon_social,
            'direccion' => $request->direccion,
            'nombre_comercial' => $request->nombre_comercial,
            'ruc_empresa' => $request->ruc_empresa,
            'codigo_actividad_id' => $request->codigo_actividad_id,
        ]); */
        // Otra forma de crear un nuevo registro
        // EmpresaMeDestacan::create($request->all());
        // Redireccionar al index con un mensaje de éxito
        // return redirect()->route('empresasD.index')->with('success', 'Empresa creada exitosamente.');
    
        // return redirect()->route('destacan.index')->with('success', 'Empresa creada exitosamente.');

        $empresaDest = new EmpresaMeDestacan();
        $empresaDest->razon_social=$request->input('razon_social');
        $empresaDest->direccion=$request->input('direccion');
        $empresaDest->nombre_comercial=$request->input('nombre_comercial');
        $empresaDest->ruc_empresa=$request->input('ruc_empresa');
        $empresaDest->codigo_actividad_id=$request->input('codigo_actividad_id');
        $empresaDest->save();
        return redirect()->route('empresasD.index')->with('success', 'Empresa actualizada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmpresaMeDestacan  $empresaMeDestacan
     * @return \Illuminate\Http\Response
     */
    public function show(EmpresaMeDestacan $empresaMeDestacan)
    {
        return view('empresasD.show', compact('empresaMeDestacan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmpresaMeDestacan  $empresaMeDestacan
     * @return \Illuminate\Http\Response
     */
    public function edit( $id, Request $request)
    {

        $empresaDest = EmpresaMeDestacan::findOrFail($id);
        if ($request->ajax()) {
            return response()->json([
                'view' => view('empresasD.edit', compact('empresaDest'))->render(),
                'url' => route('empresasD.edit', $request->query())
            ]);
        }
        return view('home')->with([
            'view' => 'empresasD.edit',
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
    public function update(Request $request, $id)
    {
        /* $empresaDest = EmpresaMeDestacan::find($id);
        //actualizar la empresa existente

        $empresaDest->update([
            'razon_social' => $request->razon_social,
            'direccion' => $request->direccion,
            'nombre_comercial' => $request->nombre_comercial,
            'ruc_empresa' => $request->ruc_empresa,
            'codigo_actividad_id' => $request->tipo,
        ]);

        // Redireccionar al index con un mensaje de éxito
        return redirect()->route('empresasD.index')->with('success', 'Empresa actualizada exitosamente.'); */

        $empresaDest = EmpresaMeDestacan::find($id);
        $empresaDest->razon_social=$request->input('razon_social');
        $empresaDest->direccion=$request->input('direccion');
        $empresaDest->nombre_comercial=$request->input('nombre_comercial');
        $empresaDest->ruc_empresa=$request->input('ruc_empresa');
        $empresaDest->codigo_actividad_id=$request->input('codigo_actividad_id');
        $empresaDest->update();
        return redirect()->route('empresasD.index')->with('success', 'Empresa actualizada exitosamente.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmpresaMeDestacan  $empresaMeDestacan
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmpresaMeDestacan $empresaMeDestacan, $id)
    {
        $empresaMeDestacan = EmpresaMeDestacan::findOrFail($id);
        $empresaMeDestacan->delete();

        return redirect()->route('empresasD.index')->with('success', 'Empresa eliminada exitosamente.');

    }
}
