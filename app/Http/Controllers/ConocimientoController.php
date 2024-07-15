<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConocimientoCreateRequest;

use App\Models\Conocimiento;
use Illuminate\Http\Request;

class ConocimientoController extends Controller
{
    //
    public function index(Request $request)

    {

        $conocimientos=Conocimiento::paginate(5);
        if ($request->ajax()) {
            return response()->json([
                'view' => view('empleados.planillas.conocimiento.index', compact('conocimientos'))->render(),
                'url' => route('conocimiento.index', $request->query())
            ]);
        }
        return view('home')->with([
            'view' => 'empleados.planillas.conocimiento.index',
            'data' => compact('conocimientos'),
        ]);
    
    }


    public function store(ConocimientoCreateRequest $request)
    {
        
        Conocimiento::create($request->validated());

        return redirect()->route('conocimiento.index')->with('success', 'Conocimiento creado correctamente');
    }



    public function destroy(Conocimiento $conocimiento)
    {
        $conocimiento->delete();
        return redirect()->route('conocimiento.index')->with('success', 'Conocimiento borrado exitosamente');
    }








    public function update(ConocimientoCreateRequest $request, $id){

            
            $conocimientoId = Conocimiento::findOrFail($id);
    
            $conocimiento = $request->only('nombre', 'nivel');
            $conocimientoId->update($conocimiento);
    
            
            return redirect()->route('conocimiento.index')->with('success', 'Conocimiento actualizado exitosamente');
            
        
    }


    
    
    
}


