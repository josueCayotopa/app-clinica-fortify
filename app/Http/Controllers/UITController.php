<?php

namespace App\Http\Controllers;

use App\Models\UIT;
use App\Models\UITMensual;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UITController extends Controller
{
    public function index()
    {
        $uits = Uit::paginate(5);
        return view('configuracion.uit.index', compact('uits'));
    }

    public function create()
    {
        return view('configuracion.uit.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ano_proceso' => 'required|numeric|digits:4|unique:u_i_t_s,ano_proceso',
            'num_uit_deducible' => 'nullable|numeric',
        ]);

        // Crear el UIT
        $uit = Uit::create($request->all());

        // Crear valores mensuales para el UIT creado
        $meses = range(1, 12);
        foreach ($meses as $mes) {
            // Ajustar el formato del mes
            $mesFormateado = sprintf('%02d', $mes);

            UitMensual::create([
                'ano_proceso' => $request->ano_proceso,
                'mes_proceso' => $mesFormateado,
                'imp_valor_uit' => $request->input("meses.$mesFormateado"),
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

    public function edit($ano_proceso)
    {
        $uit = Uit::where('ano_proceso', $ano_proceso)->firstOrFail();
        $valoresMensuales = UitMensual::where('ano_proceso', $ano_proceso)->get();

        return view('configuracion.uit.edit', compact('uit', 'valoresMensuales'));
    }

    public function update(Request $request, $ano_proceso)
    {
        $request->validate([
            'ano_proceso' => 'required|numeric|digits:4|unique:u_i_t_s,ano_proceso,' . $ano_proceso . ',ano_proceso',
            'num_uit_deducible' => 'nullable|numeric',
        ]);

        // Actualizar el UIT
        $uit = Uit::where('ano_proceso', $ano_proceso)->firstOrFail();
        $uit->update($request->only(['ano_proceso', 'num_uit_deducible']));

        // Actualizar valores mensuales para el UIT
        $meses = range(1, 12);
        foreach ($meses as $mes) {
            $mesFormateado = sprintf('%02d', $mes);
            $imp_valor_uit = $request->input("meses.$mesFormateado");

            $uitMensual = UitMensual::where('ano_proceso', $ano_proceso)
                ->where('mes_proceso', $mesFormateado)
                ->first();

            if ($uitMensual) {
                $uitMensual->update([
                    'imp_valor_uit' => $imp_valor_uit,
                ]);
            } else {
                UitMensual::create([
                    'ano_proceso' => $ano_proceso,
                    'mes_proceso' => $mesFormateado,
                    'imp_valor_uit' => $imp_valor_uit,
                ]);
            }
        }

        return redirect()->route('uits.index')
            ->with('success', 'UIT y valores mensuales actualizados correctamente');
    }

    public function destroy($id)
    {
        $uit = Uit::findOrFail($id);
        $uit->delete();
        return redirect()->route('uits.index')->with('success', 'Asignación de UIT eliminada exitosamente.');
    }
}
