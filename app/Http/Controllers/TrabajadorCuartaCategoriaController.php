<?php

namespace App\Http\Controllers;

use App\Models\CategoriaPeriodo;
use App\Models\Departamento_Region;
use App\Models\Distrito;
use App\Models\Empresa;
use App\Models\MotivoFinPeriodo;
use App\Models\Nacionalidad;
use App\Models\Periodicidad;
use App\Models\Provincia;
use App\Models\TipoDocumento;
use App\Models\TrabajadorCuartaCategoria;
use App\Models\Via;
use App\Models\Zona;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class TrabajadorCuartaCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           
        
        
        return view('home')->with([
            'view' => 'empleados.cuarta_categoria.index'
            
            
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoDocumento = TipoDocumento::pluck('descripcion', 'id');
        $nacionalidad = Nacionalidad::pluck('descripcion', 'id');
        $departamentos = Departamento_Region::pluck('descripcion', 'id');
        $provincias = Provincia::pluck('descripcion', 'id');
        $distritos = Distrito::pluck('descripcion', 'id');
        $zonas = Zona::pluck('descripcion', 'id');
        $vias = Via::pluck('descripcion', 'id');
        $empresas = Empresa::pluck('razon_social', 'id');
        $periodicidad = Periodicidad::pluck('descripcion', 'id');
        $categoriaPeriodo = CategoriaPeriodo::pluck('descripcion', 'id');
        $motivoFinPeriodo = MotivoFinPeriodo::pluck('descripcion', 'id');


        return view('home')->with([
            'view' => 'empleados.cuarta_categoria.create',
            'data' => compact('tipoDocumento',
            'nacionalidad',
            'departamentos',
            'provincias',
            'distritos',
            'zonas',
            'vias',
            'empresas',
            'periodicidad',
            'categoriaPeriodo',
            'motivoFinPeriodo')
            
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
     * @param  \App\Models\TrabajadorCuartaCategoria  $trabajadorCuartaCategoria
     * @return \Illuminate\Http\Response
     */
    public function show(TrabajadorCuartaCategoria $trabajadorCuartaCategoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrabajadorCuartaCategoria  $trabajadorCuartaCategoria
     * @return \Illuminate\Http\Response
     */
    public function edit(TrabajadorCuartaCategoria $trabajadorCuartaCategoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrabajadorCuartaCategoria  $trabajadorCuartaCategoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrabajadorCuartaCategoria $trabajadorCuartaCategoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrabajadorCuartaCategoria  $trabajadorCuartaCategoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrabajadorCuartaCategoria $trabajadorCuartaCategoria)
    {
        //
    }
}
