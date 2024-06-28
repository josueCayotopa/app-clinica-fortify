<?php

namespace App\Http\Controllers;

use App\Http\Requests\ZonaStoreRequest;
use App\Models\Zona;
use Illuminate\Http\Request;

class ZonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    
        $zonas = Zona::paginate(5);
        if ($request->ajax()) {
            return response()->json([
                'view' => view('empleados.planillas.zonas.index', compact('zonas'))->render(),
                'url' => route('zona.index', $request->query())
            ]);
        }
        return view('home')->with([
            'view' => 'empleados.planillas.zonas.index',
            'data' => compact('zonas'),
        ]);
        
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
    public function store(ZonaStoreRequest $request)
    {
        Zona::create($request->validated());

        return redirect()->route('zona.index')->with('success', 'Zona creada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ZonaStoreRequest $request, $id)
    {
            $zonaId = Zona::findOrFail($id);
    
            $zona = $request->only('descrip_zona');
            $zonaId->update($zona);
    
            
            return redirect()->route('zona.index')->with('success', 'Zona actualizada exitosamente');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zona $zona)
    {
        
        $zona->delete();
        return redirect()->route('zona.index')->with('success', 'Zona borrada exitosamente');


    }
}
