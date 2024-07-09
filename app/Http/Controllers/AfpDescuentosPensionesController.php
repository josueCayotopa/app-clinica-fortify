<?php

namespace App\Http\Controllers;

use App\Models\AfpDescuentosPensiones;
use App\Models\RegimenAfp;
use App\Models\RegimenPencionario;
use Illuminate\Http\Request;

class AfpDescuentosPensionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $regimenes = RegimenPencionario::all();
        $regimenId = $request->input('regimen_id', null);
        $fecha = $request->input('fecha', now()->format('Y-m'));

        $query = AfpDescuentosPensiones::with(['afp', 'descuento']);

        if ($regimenId) {
            $query->whereHas('afp', function($q) use ($regimenId) {
                $q->where('regimen_id', $regimenId);
            });
        }

        $query->whereDate('fecha', 'like', $fecha . '%');

        $descuentos = $query->get();
        $afps = RegimenAfp::all();
        
        if ($request->ajax()) {
            return response()->json([
                'view' => view('regimen_pensionarios.index', compact('descuentos', 'regimenes', 'regimenId', 'fecha', 'afps'))->render(),
                'url' => route('descuentos.index', $request->query())
            ]);
        }
        return view('home')->with([
            'view' => 'regimen_pensionarios.index',
            'data' => compact('descuentos', 'regimenes', 'regimenId', 'fecha', 'afps'),
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
        if ($request->ajax()) {
            return response()->json([
                'view' => view('regimen_pensionarios.create')->render(),
                'url' => route('descuentos.create', $request->query())
            ]);
        }
        return view('home')->with([
            'view' => 'regimen_pensionarios.create',
           
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
     * @param  \App\Models\AfpDescuentosPensiones  $afpDescuentosPensiones
     * @return \Illuminate\Http\Response
     */
    public function show(AfpDescuentosPensiones $afpDescuentosPensiones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AfpDescuentosPensiones  $afpDescuentosPensiones
     * @return \Illuminate\Http\Response
     */
    public function edit(AfpDescuentosPensiones $afpDescuentosPensiones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AfpDescuentosPensiones  $afpDescuentosPensiones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AfpDescuentosPensiones $afpDescuentosPensiones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AfpDescuentosPensiones  $afpDescuentosPensiones
     * @return \Illuminate\Http\Response
     */
    public function destroy(AfpDescuentosPensiones $afpDescuentosPensiones)
    {
        //
    }
}
