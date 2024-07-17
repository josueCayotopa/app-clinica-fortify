<?php

namespace App\Http\Controllers;

use App\Models\ConceptoSunat;
use Illuminate\Http\Request;

class ConceptoSunatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conceptos = ConceptoSunat::paginate(5);
        return view('empleados.conceptos.index', compact('conceptos'));
    }
    public function create()
    {
        return view('empleados.conceptos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|max:6',
            'descripcion' => 'nullable|string|max:100',
            'essalud_seguro_regular_trabajador' => 'nullable|boolean',
            'essalud_cbssp_seg_trab_pesquero' => 'nullable|boolean',
            'essalud_seguro_agrario_acuicultor' => 'nullable|boolean',
            'essalud_sctr' => 'nullable|boolean',
            'senati' => 'nullable|boolean',
            'sistema_nacional_de_pensiones_1999' => 'nullable|boolean',
            'sistema_privado_de_pensiones' => 'nullable|boolean',
            'renta_5ta_categoría_retenciones' => 'nullable|boolean',
            'essalud_seguro_regular_pensionista' => 'nullable|boolean',
            'contrib_solidaria_asistencia_sprevis' => 'nullable|boolean',

            // Añade validaciones para otros campos según sea necesario
        ]);

        $concepto = new ConceptoSunat();
        $concepto->codigo = $request->codigo;
        $concepto->descripcion = $request->descripcion;
        $concepto->essalud_seguro_regular_trabajador = $request->has('essalud_seguro_regular_trabajador') ? '1' : '0';
        $concepto->essalud_cbssp_seg_trab_pesquero = $request->has('essalud_cbssp_seg_trab_pesquero') ? '1' : '0';
        $concepto->essalud_seguro_agrario_acuicultor = $request->has('essalud_seguro_agrario_acuicultor') ? '1' : '0';
        $concepto->essalud_sctr = $request->has('essalud_sctr') ? '1' : '0';
        $concepto->senati = $request->has('senati') ? '1' : '0';
        $concepto->sistema_nacional_de_pensiones_1999 = $request->has('sistema_nacional_de_pensiones_1999') ? '1' : '0';
        $concepto->sistema_privado_de_pensiones = $request->has('sistema_privado_de_pensiones') ? '1' : '0';
        $concepto->renta_5ta_categoría_retenciones = $request->has('renta_5ta_categoría_retenciones') ? '1' : '0';
        $concepto->essalud_seguro_regular_pensionista = $request->has('essalud_seguro_regular_pensionista') ? '1' : '0';

        $concepto->contrib_solidaria_asistencia_sprevis = $request->has('contrib_solidaria_asistencia_sprevis') ? '1' : '0';
        
        
        
        
        
        
        // Asigna otros campos según sea necesario

        $concepto->save();

        return redirect()->route('conceptos.index')->with('success', 'Concepto creado con éxito');
    }

    public function show(ConceptoSunat $conceptoSunat)
    {
    }

    public function edit(ConceptoSunat $concepto)
    {
        return view('empleados.conceptos.edit', compact('concepto'));
    }

    public function update(Request $request, $id)
    {$request->validate([
        'codigo' => 'required|string|max:6',
        'descripcion' => 'nullable|string|max:100',
        'essalud_seguro_regular_trabajador' => 'nullable|boolean',
        'essalud_cbssp_seg_trab_pesquero' => 'nullable|boolean',
        'essalud_seguro_agrario_acuicultor' => 'nullable|boolean',
        'essalud_sctr' => 'nullable|boolean',
        'impuesto_extraord_de_solidaridad' => 'nullable|boolean',
        'fondo_derechos_sociales_del_artista' => 'nullable|boolean',
        'senati' => 'nullable|boolean',
        'sistema_nacional_de_pensiones_1999' => 'nullable|boolean',
        'sistema_privado_de_pensiones' => 'nullable|boolean',
        'renta_5ta_categoría_retenciones' => 'nullable|boolean',
        'essalud_seguro_regular_pensionista' => 'nullable|boolean',
        'contrib_solidaria_asistencia_sprevis' => 'nullable|boolean',
    ]);

    // Obtener el concepto por su ID
    $conceptoSunat = ConceptoSunat::findOrFail($id);

    // Actualizar los datos del modelo con los valores del formulario
    $conceptoSunat->codigo = $request->codigo;
    $conceptoSunat->descripcion = $request->descripcion;
    $conceptoSunat->essalud_seguro_regular_trabajador = $request->input('essalud_seguro_regular_trabajador', 0);
    $conceptoSunat->essalud_cbssp_seg_trab_pesquero = $request->input('essalud_cbssp_seg_trab_pesquero', 0);
    $conceptoSunat->essalud_seguro_agrario_acuicultor = $request->input('essalud_seguro_agrario_acuicultor', 0);
    $conceptoSunat->essalud_sctr = $request->input('essalud_sctr', 0);
    $conceptoSunat->impuesto_extraord_de_solidaridad = $request->input('impuesto_extraord_de_solidaridad', 0);
    $conceptoSunat->fondo_derechos_sociales_del_artista = $request->input('fondo_derechos_sociales_del_artista', 0);
    $conceptoSunat->senati = $request->input('senati', 0);
    $conceptoSunat->sistema_nacional_de_pensiones_1999 = $request->input('sistema_nacional_de_pensiones_1999', 0);
    $conceptoSunat->sistema_privado_de_pensiones = $request->input('sistema_privado_de_pensiones', 0);
    $conceptoSunat->renta_5ta_categoría_retenciones = $request->input('renta_5ta_categoría_retenciones', 0);
    $conceptoSunat->essalud_seguro_regular_pensionista = $request->input('essalud_seguro_regular_pensionista', 0);
    $conceptoSunat->contrib_solidaria_asistencia_sprevis = $request->input('contrib_solidaria_asistencia_sprevis', 0);

    // Guardar los cambios en la base de datos
    $conceptoSunat->save();

    // Redireccionar a la página de índice de conceptos con un mensaje de éxito
    return redirect()->route('conceptos.index')
        ->with('success', 'Concepto Sunat actualizado exitosamente.');
    }

    public function destroy(ConceptoSunat $conceptoSunat)
    {
        $conceptoSunat->delete();
        return redirect()->route('conceptos.index')->with('success', 'Concepto Sunat eliminado exitosamente.');
    }
}
