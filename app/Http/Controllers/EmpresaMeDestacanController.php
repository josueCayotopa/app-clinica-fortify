<?php

namespace App\Http\Controllers;

use App\Models\EmpresaMeDestacan;
use App\Models\Tipo_de_Actividad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Laravel\Ui\Presets\React;

class EmpresaMeDestacanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('user_index'), 403);

        $empresadest = EmpresaMeDestacan::all();

        if ($request->ajax()) {
            return response()->json([
                'view' => view('empresaDest.index', compact('empresadest'))->render(),
                'url' => route('empresaDest.index', $request->query())
            ]);
        }
        return view('home')->with([
            'view' => 'empresaDest.index',
            'data' => compact('empresadest'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tipo_actividad = Tipo_de_Actividad::pluck('descripcion','id');

        $data = compact(
            'tipo_actividad',

        );
        if ($request->ajax()) {
            return response()->json([
                'view' => view('empresaDest.create', $data)->render(),
                'url' => route('pensionistas.create', $request->query())
            ]);
        }
        return view('home')->with([
            /* 'view' => view('pensionistas.create', $data)->render(),
            'data' => compact('data', $request->query()) */
            'view' => 'pensionistas.create',
            'data' => $data,

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
     * @param  \App\Models\EmpresaMeDestacan  $empresaMeDestacan
     * @return \Illuminate\Http\Response
     */
    public function show(EmpresaMeDestacan $empresaMeDestacan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmpresaMeDestacan  $empresaMeDestacan
     * @return \Illuminate\Http\Response
     */
    public function edit(EmpresaMeDestacan $empresaMeDestacan)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmpresaMeDestacan  $empresaMeDestacan
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmpresaMeDestacan $empresaMeDestacan)
    {
        //
    }
}
