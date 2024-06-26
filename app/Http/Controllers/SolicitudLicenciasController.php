<?php

namespace App\Http\Controllers;

use App\Models\SolicitudLicencias;
use Illuminate\Http\Request;

class SolicitudLicenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $licencias = SolicitudLicencias::paginate(5);
        return view('licencias.index', compact('licencias'));

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
     * @param  \App\Models\SolicitudLicencias  $solicitudLicencias
     * @return \Illuminate\Http\Response
     */
    public function show(SolicitudLicencias $solicitudLicencias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SolicitudLicencias  $solicitudLicencias
     * @return \Illuminate\Http\Response
     */
    public function edit(SolicitudLicencias $solicitudLicencias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SolicitudLicencias  $solicitudLicencias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SolicitudLicencias $solicitudLicencias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SolicitudLicencias  $solicitudLicencias
     * @return \Illuminate\Http\Response
     */
    public function destroy(SolicitudLicencias $solicitudLicencias)
    {
        //
    }
}
