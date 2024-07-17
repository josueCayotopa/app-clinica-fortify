<?php

namespace App\Http\Controllers;

use App\Http\Livewire\RegimenAfpCrud;
use App\Models\AfpDescuentosPensiones;
use App\Models\DescuentoRegimemPencionario;
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
        $query = AfpDescuentosPensiones::with(['afp', 'descuento']);

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('afp.nombre', 'like', '%' . $search . '%')
                    ->orWhere('descuento.descripcion', 'like', '%' . $search . '%')
                    ->orWhere('tipo_comision', 'like', '%' . $search . '%')
                    ->orWhere('fecha', 'like', '%' . $search . '%')
                    ->orWhere('porcentaje', 'like', '%' . $search . '%')
                    ->orWhere('importe_tope', 'like', '%' . $search . '%');
            });
        }

        $descuentos = $query->get();

        if ($request->ajax()) {
            return response()->json([
                'view' => view('regimen_pensionarios.index', compact('descuentos'))->render(),
                'url' => route('descuentos_pensiones.index', $request->query())
            ]);
        }

        return view('home')->with([
            'view' => 'regimen_pensionarios.index',
            'data' => compact('descuentos'),
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {


        $regimenesAfp = RegimenAfp::all();
        $descuentos = DescuentoRegimemPencionario::all();
        $regimenes = RegimenPencionario::all();


        if ($request->ajax()) {
            return response()->json([
                'view' => view('regimen_pensionarios.create', compact('regimenesAfp', 'descuentos', 'regimenes'))->render(),
                'url' => route('descuentos_pensiones.create', $request->query())
            ]);
        }
        return view('home')->with([
            'view' => 'regimen_pensionarios.create',
            'data' => compact('regimenesAfp', 'descuentos', 'regimenes'),

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
        // Validación de los datos del formulario
        // Validación de los datos del formulario
        $request->validate([

            'afp_id' => 'required|exists:regimen_afps,id',
            'descuento_id' => 'required|exists:descuento_regimem_pencionarios,id',
            'tipo_comision' => 'required|in:FLUJO,MIXTA',
            'fecha' => 'required|date_format:Y-m', // Validación del formato de fecha YYYY-MM
            'porcentaje' => 'required|numeric|between:0,100',
            'importe_tope' => 'required|numeric|min:0'
        ]);

        // Creación del registro en la base de datos
        AfpDescuentosPensiones::create([
            'afp_id' => $request->afp_id,
            'descuento_id' => $request->descuento_id,
            'tipo_comision' => $request->tipo_comision,
            'fecha' => $request->fecha . '-01', // Almacenar como primer día del mes para compatibilidad con campo DATE
            'porcentaje' => $request->porcentaje,
            'importe_tope' => $request->importe_tope
        ]);

        // Redirección con mensaje de éxito
        return redirect()->route('descuentos_pensiones.index')->with('success', 'Descuento AFP guardado con éxito.');
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
    public function edit($id, Request $request)
    {
        
        
        $regimenesAfp = RegimenAfp::all();
        $descuentos = DescuentoRegimemPencionario::all();
        $descuento = AfpDescuentosPensiones::findOrFail($id);
        $regimenes = RegimenPencionario::all();


        if ($request->ajax()) {
            return response()->json([
                'view' => view('regimen_pensionarios.edit', compact('regimenesAfp', 'descuentos', 'regimenes', 'descuento'))->render(),
                'url' => route('descuentos_pensiones.edit', $request->query())
            ]);
        }
        return view('home')->with([
            'view' => 'regimen_pensionarios.edit',
            'data' => compact('regimenesAfp', 'descuentos', 'regimenes', 'descuento'),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AfpDescuentosPensiones  $afpDescuentosPensiones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'regimen_id' => 'required',
            'afp_id' => 'required',
            'descuento_id' => 'required',
            'tipo_comision' => 'required',
            'fecha' => 'required',
            'porcentaje' => 'required',
            'importe_tope' => 'required',
        ]);

        $descuento = AfpDescuentosPensiones::findOrFail($id);
        $descuento->regimen_id = $request->regimen_id;
        $descuento->afp_id = $request->afp_id;
        $descuento->descuento_id = $request->descuento_id;
        $descuento->tipo_comision = $request->tipo_comision;
        $descuento->fecha = $request->fecha;
        $descuento->porcentaje = $request->porcentaje;
        $descuento->importe_tope = $request->importe_tope;
        $descuento->save();

        return redirect()->route('descuentos_pensiones.index')
            ->with('success', 'Descuento actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AfpDescuentosPensiones  $afpDescuentosPensiones
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $descuento = AfpDescuentosPensiones::findOrFail($id);
        $descuento->delete();

        return redirect()->route('descuentos_pensiones.index')
            ->with('success', 'Descuento eliminado exitosamente.');
    }
}
