<?php

namespace App\Http\Controllers;

use App\Models\TipoTrabajadorIpss;
use Illuminate\Http\Request;

class TipoTrabajadorIpssController extends Controller
{
    public function index(Request $request)
    {
        $tipoTrabajadorIpsses = TipoTrabajadorIpss::paginate(10);
        if ($request->ajax()) {
            return response()->json([
                'view' => view('configuracion.tipo_trabajador_ipss.index', compact('tipoTrabajadorIpsses'))->render(),
                'url' => route('tipo_trabajador_ipsses.index', $request->query())
            ]);
        }
        return view('home')->with([
            'view' => 'configuracion.tipo_trabajador_ipss.index',
            'data' => compact('tipoTrabajadorIpsses'),
        ]);
       
    }

    public function store(Request $request)
    {
        $request->validate([
            'COD_TRABAJ_IPSS' => 'required|string|max:2|unique:tipo_trabajador_ipsses,COD_TRABAJ_IPSS',
            'DES_COD_TRABAJ_IPSS' => 'nullable|string|max:50',
        ]);

        TipoTrabajadorIpss::create($request->all());

        return redirect()->route('tipo_trabajador_ipsses.index')->with('success', 'Tipo Trabajador IPSS creado exitosamente.');
    }

    public function edit(TipoTrabajadorIpss $tipoTrabajadorIpss)
    {
        return response()->json($tipoTrabajadorIpss);
    }

    public function update(Request $request, TipoTrabajadorIpss $tipoTrabajadorIpss)
    {
        $request->validate([
            'COD_TRABAJ_IPSS' => 'required|string|max:2|unique:tipo_trabajador_ipsses,COD_TRABAJ_IPSS,' . $tipoTrabajadorIpss->id,
            'DES_COD_TRABAJ_IPSS' => 'nullable|string|max:50',
        ]);

        $tipoTrabajadorIpss->update($request->all());

        return redirect()->route('tipo_trabajador_ipsses.index')->with('success', 'Tipo Trabajador IPSS actualizado exitosamente.');
    }

    public function destroy(TipoTrabajadorIpss $tipoTrabajadorIpss)
    {
        $tipoTrabajadorIpss->delete();

        return redirect()->route('tipo_trabajador_ipsses.index')->with('success', 'Tipo Trabajador IPSS eliminado exitosamente.');
    }
}
