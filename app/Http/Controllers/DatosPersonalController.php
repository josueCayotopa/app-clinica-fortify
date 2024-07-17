<?php

namespace App\Http\Controllers;

use App\Models\DatosPersonal;
use Illuminate\Http\Request;

class DatosPersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\DatosPersonal  $datosPersonal
     * @return \Illuminate\Http\Response
     */
    public function show(DatosPersonal $datosPersonal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DatosPersonal  $datosPersonal
     * @return \Illuminate\Http\Response
     */
    public function edit(DatosPersonal $datosPersonal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DatosPersonal  $datosPersonal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DatosPersonal $datosPersonal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DatosPersonal  $datosPersonal
     * @return \Illuminate\Http\Response
     */
    public function destroy(DatosPersonal $datosPersonal)
    {
        //
    }
    public function search(Request $request)
    {
        $query = DatosPersonal::query();

        if ($request->filled('numero_documento')) {
            $query->where('numero_documento', $request->numero_documento);
        }

        if ($request->filled('nombre')) {
            $query->where('nombre', 'like', '%' . $request->nombre . '%');
        }

        $personal = $query->first();

        return response()->json(['trabajador' => $personal]);
    }
}
