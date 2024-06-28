<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfesionStoreRequest;

use Illuminate\Http\Request;
use App\Models\Profesion;

class ProfesionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $profesiones=Profesion::paginate(10);
        if ($request->ajax()) {
            return response()->json([
                'view' => view('empleados.planillas.profesiones.index', compact('profesiones'))->render(),
                'url' => route('profesion.index', $request->query())
            ]);
        }
        return view('home')->with([
            'view' => 'empleados.planillas.profesiones.index',
            'data' => compact('profesiones'),
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
    public function store(ProfesionStoreRequest $request)
    {
        //public function store(ConocimientoCreateRequest $request)
    
        
        Profesion::create($request->validated());

        return redirect()->route('profesion.index')->with('success', 'Profesión creada correctamente');
    
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
    public function update(ProfesionStoreRequest $request, $id)
    {

            $profesionId = Profesion::findOrFail($id);
    
            $profesion = $request->only('nombre');
            $profesionId->update($profesion);
    
            
            return redirect()->route('profesion.index')->with('success', 'Profesión actualizado exitosamente');
            
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profesion $profesion)
    {
        $profesion->delete();
        return redirect()->route('profesion.index')->with('success', 'Profesion borrado exitosamente');
    }
}
