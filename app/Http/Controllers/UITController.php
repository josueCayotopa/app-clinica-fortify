<?php

namespace App\Http\Controllers;

use App\Models\UIT;
use App\Models\UITMensual;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UITController extends Controller
{
    public function index(Request $request)
    {
        $uits = Uit::paginate(5);
        if ($request->ajax()) {
            return response()->json([
                'view' => view('configuracion.uit.index', compact('uits'))->render(),
                'url' => route('uits.index', $request->query())
            ]);
        }
        return view('home')->with([
            'view' => 'configuracion.uit.index',
            'data' => compact('uits'),
        ]);
    }

    public function create(Request $request)
    {
        if ($request->ajax()) {
            return response()->json([
                'view' => view('configuracion.uit.create')->render(),
                'url' => route('uits.create', $request->query())
            ]);
        }
        return view('home')->with([
            'view' => 'configuracion.uit.create',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ano_proceso' => 'required|numeric|digits:4|unique:u_i_t_s,ano_proceso',
            'num_uit_deducible' => 'nullable|numeric',
            'meses.*' => 'nullable|numeric', // Validar cada valor de meses
        ]);
    
        // Crear el UIT
        $uit = Uit::create([
            'ano_proceso' => $validatedData['ano_proceso'],
            'num_uit_deducible' => $validatedData['num_uit_deducible'],
        ]);
    
        // Crear valores mensuales para el UIT creado
        foreach ($validatedData['meses'] as $mes => $valor) {
            // Ajustar el formato del mes
            $mesFormateado = sprintf('%02d', $mes);
    
            UitMensual::create([
                'ano_proceso' => $uit->ano_proceso,
                'mes_proceso' => $mesFormateado,
                'imp_valor_uit' => $valor,
            ]);
        }
    
        return redirect()->route('uits.index')
            ->with('success', 'UIT y valores mensuales creados correctamente');
    }
    

    public function show($id)
    {
        $uit = Uit::findOrFail($id);
        return view('configuracion.uit.show', compact('uit'));
    }

    public function edit($ano_proceso, Request $request)
    {
        $uit = Uit::where('ano_proceso', $ano_proceso)->firstOrFail();
        $valoresMensuales = UitMensual::where('ano_proceso', $ano_proceso)->get();

        if ($request->ajax()) {
            return response()->json([
                'view' => view('configuracion.uit.edit', compact('uit', 'valoresMensuales'))->render(),
                'url' => route('uits.edit', $ano_proceso)
            ]);
        }

        return view('home')->with([
            'view' => 'configuracion.uit.edit',
            'data' => compact('uit', 'valoresMensuales'),
        ]);
    }

    public function update(Request $request, $ano_proceso)
    {
        $validatedData = $request->validate([
            'ano_proceso' => 'required|integer',
            'num_uit_deducible' => 'required|numeric',
            'meses.*' => 'nullable|numeric',
        ]);

        $uit = Uit::where('ano_proceso', $ano_proceso)->firstOrFail();
        $uit->update([
            'num_uit_deducible' => $validatedData['num_uit_deducible']
        ]);

        foreach ($validatedData['meses'] as $mes => $valor) {
            UitMensual::updateOrCreate(
                ['ano_proceso' => $ano_proceso, 'mes_proceso' => $mes],
                ['imp_valor_uit' => $valor]
            );
        }

        return redirect()->route('uits.index', $ano_proceso)->with('success', 'UIT actualizada correctamente');
    }

    public function destroy($id)
    {
        $uit = Uit::findOrFail($id);
        $uit->delete();
        return redirect()->route('uits.index')->with('warning', 'Asignación de UIT eliminada exitosamente.');
    }
}
