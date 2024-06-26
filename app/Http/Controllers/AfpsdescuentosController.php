<?php

namespace App\Http\Controllers;

use App\Http\Controllers\TipoDescuentos as ControllersTipoDescuentos;
use App\Models\Afp;
use App\Models\Afpsdescuentos;
use App\Models\TipoDescuentos;
use Illuminate\Http\Request;

class AfpsdescuentosController extends Controller
{
    public function index()
    {
        $afpDescuentos = Afpsdescuentos::with(['afp', 'tipoDescuento'])->get();
        return view('empleados.maestros.afp.afp.index', compact('afpDescuentos'));
    }

     public function edit($id)
    {
        $afpDescuento = Afpsdescuentos::findOrFail($id);
        $afp = Afp::findOrFail($afpDescuento->afp_id);
        $tiposDescuentos = TipoDescuentos::all();
        return view('empleados.maestros.descuentoAfp.editarafpdescuento', compact('afpDescuento', 'afp', 'tiposDescuentos'));
    }

    public function update(Request $request, $id)
    {
        $afpDescuento = Afpsdescuentos::findOrFail($id);
        $afp = $afpDescuento->afp;
    
        $request->validate([
            'codigo_afp' => 'required|string|max:255',
            'nombre_afp' => 'required|string|max:255',
            'estado_afp' => 'boolean',
            'fecha_baja_afp' => 'nullable|date',
            'selected_descuento_id' => 'required|exists:tipos_descuentos,id', // Validar que el ID del tipo de descuento seleccionado exista en la tabla
            'codigo.*' => 'required|string|max:255',
            'anio_proceso.*' => 'required|integer',
            'mes_proceso.*' => 'required|integer',
            'descripcion.*' => 'required|string|max:255',
            'porcentaje_descuento.*' => 'required|numeric|min:0|max:100',
            'indice_tope.*' => 'nullable|string|max:255',
            'importe_tope.*' => 'nullable|numeric',
        ]);
    
        // Actualizar los datos de la entidad Afp
        $afp->update([
            'codigo' => $request->codigo_afp,
            'nombre' => $request->nombre_afp,
            'estado' => $request->estado_afp,
            'fecha_baja' => $request->fecha_baja_afp,
        ]);
    
        // Obtener el ID del tipo de descuento seleccionado
        $tipoDescuentoId = $request->input('selected_descuento_id');
    
        // Actualizar los datos del tipo de descuento seleccionado
        $tipoDescuento = TipoDescuentos::findOrFail($tipoDescuentoId);
        $tipoDescuento->update([
            'codigo' => $request->input("codigo.$tipoDescuentoId"),
            'anio_proceso' => $request->input("anio_proceso.$tipoDescuentoId"),
            'mes_proceso' => $request->input("mes_proceso.$tipoDescuentoId"),
            'descripcion' => $request->input("descripcion.$tipoDescuentoId"),
            'porcentaje_descuento' => $request->input("porcentaje_descuento.$tipoDescuentoId"),
            'indice_tope' => $request->input("indice_tope.$tipoDescuentoId"),
            'importe_tope' => $request->input("importe_tope.$tipoDescuentoId"),
        ]);
    
        // Actualizar la relación del descuento AFP con el tipo de descuento seleccionado
        $afpDescuento->tipo_descuento_id = $tipoDescuentoId;
        $afpDescuento->save();
    
        return redirect()->route('afp.descuentos.index')->with('success', 'Descuento AFP actualizado correctamente.');
    }

    public function destroy($id)
    {
        $afpDescuento = Afpsdescuentos::findOrFail($id);
        $afpDescuento->delete();
        return redirect()->route('afp.descuentos.index')->with('success', 'Descuento AFP eliminado con éxito');
    }
    public function create()
{
   
    $tiposDescuentos = TipoDescuentos::all();

    return view('empleados.maestros.afp.afp.create', compact('tiposDescuentos'));
}
public function store(Request $request)
{
    // Valida los datos recibidos del formulario
    $request->validate([
        'codigo_afp' => 'required|string|max:255',
        'nombre_afp' => 'required|string|max:255',
        'estado_afp' => 'boolean',
        'fecha_baja_afp' => 'nullable|date',
        // Agrega aquí validaciones para otros campos de AFP si es necesario
        'selected_descuento_id' => 'required|exists:tipos_descuentos,id',
    ]);

    // Crea un nuevo registro de Afp en la base de datos
    $afp = new Afp();
    $afp->codigo = $request->codigo_afp;
    $afp->nombre = $request->nombre_afp;
    $afp->estado = $request->estado_afp;
    $afp->fecha_baja = $request->fecha_baja_afp;
    // Asigna otros campos de AFP aquí si es necesario
    $afp->save();

    // Ahora que tenemos el ID de la nueva AFP, podemos crear el descuento asociado
    $afpDescuento = new Afpsdescuentos();
    $afpDescuento->afp_id = $afp->id;
    $afpDescuento->tipo_descuento_id = $request->selected_descuento_id;
    $afpDescuento->save();   // Redirecciona al usuario a la página de índice o a donde desees
    return redirect()->route('afp.descuentos.index')->with('success', 'Descuento AFP creado correctamente.');
}
}

