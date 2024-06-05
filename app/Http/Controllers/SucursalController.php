<?php

namespace App\Http\Controllers;

use App\Models\Departamento_Region;
use App\Models\Distrito;
use App\Models\Nacionalidad;
use App\Models\Provincia;
use App\Models\Sucursal;
use App\Models\Via;
use App\Models\Zona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('user_index'), 403);

        // $users=User::all();
        $sucursales = Sucursal::paginate(10);
        return view('configuracion.sucursal.index', compact('sucursales'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         //
         abort_if(Gate::denies('user_create'), 403);
         // le pasamos los roles 
     
         $departamentos = Departamento_Region::all()->pluck('descripcion', 'id');
         $provincias = Provincia::all()->pluck('descripcion', 'id');
         $distritos = Distrito::all()->pluck('descripcion', 'id');
         $zonas = Zona::all()->pluck('descripcion', 'id');
         $vias = Via::all()->pluck('descripcion', 'id');
         $paises = Nacionalidad::all()->pluck('descripcion', 'id');

 
         return view('configuracion.sucursal.create', compact( 'departamentos', 'provincias', 'distritos', 'zonas', 'vias', 'paises'));
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
     * @param  \App\Models\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function show(Sucursal $sucursal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function edit(Sucursal $sucursal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sucursal $sucursal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sucursal $sucursal)
    {
        //
    }
}
