<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function index()
    {
        $personals = Personal::all();
        return view('personals.index', compact('personals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tipo_documento_id' => 'required|exists:tipo_documentos,id',
            'numero_documento' => 'required|string|max:15',
            'apellido_paterno' => 'required|string|max:40',
            'apellido_materno' => 'required|string|max:40',
            'nombres' => 'required|string|max:40',
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required|string|max:1',
            'nacionalidad_id' => 'required|exists:nacionalidades,id',
            'telefono' => 'nullable|string|max:10',
            'correo_electronico' => 'nullable|string|max:50',
            'essalud_vida' => 'required|string|max:1',
            'domiciliado' => 'required|string|max:1',
            'via_id' => 'required|exists:vias,id',
            'nombre_via' => 'nullable|string|max:20',
            'numero_via' => 'nullable|string|max:4',
            'interior' => 'nullable|string|max:4',
            'zona_id' => 'required|exists:zonas,id',
            'nombre_zona' => 'nullable|string|max:20',
            'referencia' => 'nullable|string|max:40',
            'distrito_id' => 'required|exists:distritos,id',
            'tipo_trabajador_id' => 'required|exists:tipo_trabajadores,id',
            'regimen_laboral' => 'nullable|string|max:40',
            'nivel_educativo_id' => 'required|exists:nivel_educativos,id',
            'ocupacion_id' => 'required|exists:ocupaciones,id',
            'discapacidad' => 'nullable|string|max:1',
            'regimen_pensionario_id' => 'required|exists:regimen_pensionarios,id',
            'fecha_inscripcion_regimen' => 'nullable|date',
            'CUSPP' => 'nullable|string|max:12',
            'SCTR_salud' => 'nullable|string|max:1',
            'SCTR_pension' => 'nullable|string|max:1',
            'contrato_trabajo_id' => 'required|exists:contratos_trabajos,id',
            'trabajo_sujeto_alt_acum_atip_desc' => 'nullable|string|max:1',
            'trabajo_sujeto_jornada_maxima' => 'nullable|string|max:1',
            'trabajo_sujeto_horario_nocturno' => 'nullable|string|max:1',
            'ingresos_quinta_categoria' => 'nullable|string|max:1',
            'sindicalizado' => 'nullable|string|max:1',
            'periodicidad_id' => 'required|exists:periodicidades,id',
            'afiliado_eps_servicios_propios' => 'nullable|string|max:1',
            'eps_id' => 'required|exists:eps,id',
            'situacion_id' => 'required|exists:situaciones,id',
            'renta_quinta_categoria' => 'nullable|string|max:1',
            'situacion_especial_trabajador' => 'nullable|string|max:1',
            'tipo_pago_id' => 'required|exists:tipo_pagos,id',
            'afilacion_asegura_pension' => 'nullable|string|max:1',
            'categoria_ocupacional_trabajador' => 'nullable|string|max:1',
            'convenio_id' => 'required|exists:convenios,id',
        ]);

        $personal = Personal::create($validatedData);

        return redirect()->route('personals.index')->with('success', 'Personal created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Personal $personal)
    {
        return view('personals.show', compact('personal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Personal $personal)
    {
        return view('personals.edit', compact('personal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personal $personal)
    {
        $validatedData = $request->validate([
            'tipo_documento_id' => 'required|exists:tipo_documentos,id',
            'numero_documento' => 'required|string|max:15',
            'apellido_paterno' => 'required|string|max:40',
            'apellido_materno' => 'required|string|max:40',
            'nombres' => 'required|string|max:40',
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required|string|max:1',
            'nacionalidad_id' => 'required|exists:nacionalidades,id',
            'telefono' => 'nullable|string|max:10',
            'correo_electronico' => 'nullable|string|max:50',
            'essalud_vida' => 'required|string|max:1',
            'domiciliado' => 'required|string|max:1',
            'via_id' => 'required|exists:vias,id',
            'nombre_via' => 'nullable|string|max:20',
            'numero_via' => 'nullable|string|max:4',
            'interior' => 'nullable|string|max:4',
            'zona_id' => 'required|exists:zonas,id',
            'nombre_zona' => 'nullable|string|max:20',
            'referencia' => 'nullable|string|max:40',
            'distrito_id' => 'required|exists:distritos,id',
            'tipo_trabajador_id' => 'required|exists:tipo_trabajadores,id',
            'regimen_laboral' => 'nullable|string|max:40',
            'nivel_educativo_id' => 'required|exists:nivel_educativos,id',
            'ocupacion_id' => 'required|exists:ocupaciones,id',
            'discapacidad' => 'nullable|string|max:1',
            'regimen_pensionario_id' => 'required|exists:regimen_pensionarios,id',
            'fecha_inscripcion_regimen' => 'nullable|date',
            'CUSPP' => 'nullable|string|max:12',
            'SCTR_salud' => 'nullable|string|max:1',
            'SCTR_pension' => 'nullable|string|max:1',
            'contrato_trabajo_id' => 'required|exists:contratos_trabajos,id',
            'trabajo_sujeto_alt_acum_atip_desc' => 'nullable|string|max:1',
            'trabajo_sujeto_jornada_maxima' => 'nullable|string|max:1',
            'trabajo_sujeto_horario_nocturno' => 'nullable|string|max:1',
            'ingresos_quinta_categoria' => 'nullable|string|max:1',
            'sindicalizado' => 'nullable|string|max:1',
            'periodicidad_id' => 'required|exists:periodicidades,id',
            'afiliado_eps_servicios_propios' => 'nullable|string|max:1',
            'eps_id' => 'required|exists:eps,id',
            'situacion_id' => 'required|exists:situaciones,id',
            'renta_quinta_categoria' => 'nullable|string|max:1',
            'situacion_especial_trabajador' => 'nullable|string|max:1',
            'tipo_pago_id' => 'required|exists:tipo_pagos,id',
            'afilacion_asegura_pension' => 'nullable|string|max:1',
            'categoria_ocupacional_trabajador' => 'nullable|string|max:1',
            'convenio_id' => 'required|exists:convenios,id',
        ]);

        $personal->update($validatedData);

        return redirect()->route('personals.index')->with('success', 'Personal updated successfully.');
    }
}
