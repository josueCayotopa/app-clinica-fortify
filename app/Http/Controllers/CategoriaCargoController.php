<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Categoria;
use App\Models\CargoCategoria;
use App\Models\CategoriaCargo;
use App\Models\Empresa;
use Illuminate\Http\Request;

class CategoriaCargoController extends Controller
{
    public function index(Request $request)
    {
        $categorias = CategoriaCargo::with('categoria')->get()->unique('categoria_id');

        $categoriasCargos = CategoriaCargo::with('categoria', 'cargo')->get();
        if ($request->ajax()) {
            return response()->json([
                'view' => view('empleados.maestros.cargo_categoria.vistacargocategoria', compact('categoriasCargos', 'categorias'))->render(),
                'url' => route('categoria-cargo.indexcargocategoria', $request->query())
            ]);
        }
        return view('home')->with([
            'view' => 'empleados.maestros.cargo_categoria.vistacargocategoria',
            'data' => compact('categoriasCargos', 'categorias'),
        ]);
    }
    public function Categoriadestroy($id)
    {
        CategoriaCargo::where('categoria_id', $id)->delete();

        return redirect()->route('categoria-cargo.indexcargocategoria')->with('warning', 'Todas las relaciones eliminadas con éxito');
    }
    public function destroy($id)
    {
        $categoriaCargo = CategoriaCargo::findOrFail($id);
        $categoriaCargo->delete(); // Solo elimina la relación, no los cargos

        return redirect()->route('categoria-cargo.indexcargocategoria')->with('warning', 'Relación eliminada con éxito');
    }
    public function eliminarCargo($cargoid)
    {
        try {
            // Eliminar el cargo
            $categoriaCargo = CategoriaCargo::findOrFail($cargoid);
            $categoriaCargo->delete(); // Solo elimina la relación, no los cargos


            return response()->json(['message' => 'Cargo eliminado con éxito'], 200);
        } catch (\Exception $e) {
            // Manejar cualquier error que ocurra durante la eliminación
            if (request()->ajax()) {
                return response()->json(['message' => 'Error al eliminar el cargo: ' . $e->getMessage()], 500);
            }
            return redirect()->route('categoria-cargo.indexcargocategoria')->with('error', 'Error al eliminar el cargo: ' . $e->getMessage());
        }
    }

    public function edit($id, Request $request)
    {
        $empresas = Empresa::pluck('nombre_comercial', 'id');
        $categoria = Categoria::findOrFail($id);
        $cargos = Cargo::all();
        $categoriaCargos = CategoriaCargo::where('categoria_id', $id)->get();
        if ($request->ajax()) {
            return response()->json([
                'view' => view('empleados.maestros.cargo_categoria.EditarCargoControlador', compact('empresas', 'categoriaCargos', 'categoria', 'cargos'))->render(),
                'url' => route('editar-relacion-categoria-cargo', $request->query())
            ]);
        }
        return view('home')->with([
            'view' => 'empleados.maestros.cargo_categoria.EditarCargoControlador',
            'data' => compact('empresas', 'categoriaCargos', 'categoria', 'cargos'),
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validar los datos recibidos del formulario
        $request->validate([
            'empresa_id' => 'required|exists:empresas,id',
            'codigo' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'nivel' => 'required|string|max:255',
            'factor_hora_extra' => 'required|numeric',
            'factor_dia_viaje' => 'required|numeric',
            'cargos' => 'nullable|array',
            'new_codigo_cargo.*' => 'nullable|string|max:255',
            'new_descripcion_cargo.*' => 'nullable|string|max:255',
        ]);

        try {
            // Encontrar la categoría por su ID
            $categoria = Categoria::findOrFail($id);

            // Actualizar los datos de la categoría
            $categoria->update([
                'empresa_id' => $request->empresa_id,
                'codigo' => $request->codigo,
                'descripcion' => $request->descripcion,
                'nivel' => $request->nivel,
                'factor_hora_extra' => $request->factor_hora_extra,
                'factor_dia_viaje' => $request->factor_dia_viaje,
            ]);

            // Obtener los IDs de los cargos seleccionados desde el formulario
            $cargosSeleccionados = $request->input('cargos', []);

            // Obtener todas las relaciones categoría-cargo para esta categoría
            $categoriaCargos = CategoriaCargo::where('categoria_id', $categoria->id)->get();

            // Iterar sobre las relaciones existentes y eliminar aquellas que no están seleccionadas
            foreach ($categoriaCargos as $categoriaCargo) {
                if (!in_array($categoriaCargo->cargo_id, $cargosSeleccionados)) {
                    $categoriaCargo->delete();
                }
            }

            // Iterar sobre los cargos seleccionados y crear nuevas relaciones si no existen
            foreach ($cargosSeleccionados as $cargoId) {
                if (!$categoriaCargos->contains('cargo_id', $cargoId)) {
                    CategoriaCargo::create([
                        'categoria_id' => $categoria->id,
                        'cargo_id' => $cargoId,
                    ]);
                }
            }

            // Crear nuevos cargos si se han añadido
            if ($request->has('new_codigo_cargo') && $request->has('new_descripcion_cargo')) {
                foreach ($request->new_codigo_cargo as $index => $codigo) {
                    $descripcion = $request->new_descripcion_cargo[$index];

                    // Crear el nuevo cargo
                    $nuevoCargo = Cargo::create([
                        'codigo' => $codigo,
                        'descripcion' => $descripcion,
                    ]);

                    // Crear la relación entre la categoría y el nuevo cargo
                    CategoriaCargo::create([
                        'categoria_id' => $categoria->id,
                        'cargo_id' => $nuevoCargo->id,
                    ]);
                }
            }

            // Redireccionar con mensaje de éxito
            return redirect()->route('categoria-cargo.indexcargocategoria')->with('success', 'Cartegoria editada con exito');
        } catch (\Exception $e) {
            // Manejar errores y redireccionar con mensaje de error
            return redirect()->back()->with('error', 'Error al actualizar la categoría: ' . $e->getMessage());
        }
    }
    public function create(Request $request)
    {
        $cargos = Cargo::all();
        $empresas = Empresa::pluck('nombre_comercial', 'id');
        if ($request->ajax()) {
            return response()->json([
                'view' => view('empleados.maestros.cargo_categoria.CrearCargoCategoria', compact('cargos', 'empresas'))->render(),
                'url' => route('crear-relacion-categoria-cargo', $request->query())
            ]);
        }
        return view('home')->with([
            'view' => 'empleados.maestros.cargo_categoria.CrearCargoCategoria',
            'data' => compact('cargos', 'empresas'),
        ]);

    }



    public function store(Request $request)
    {
        $request->validate([
            'empresa_id' => 'required|exists:empresas,id',
            'codigo' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'nivel' => 'required|string|max:255',
            'factor_hora_extra' => 'required|numeric',
            'factor_dia_viaje' => 'required|numeric',
            'codigo_cargo.*' => 'string|max:255',
            'descripcion_cargo.*' => 'required|string|max:255',
        ]);

        // Crear la categoría
        $categoria = Categoria::create([
            'empresa_id' => $request->empresa_id,
            'codigo' => $request->codigo,
            'descripcion' => $request->descripcion,
            'nivel' => $request->nivel,
            'factor_hora_extra' => $request->factor_hora_extra,
            'factor_dia_viaje' => $request->factor_dia_viaje,
        ]);

        // Verificar qué acción se solicitó
        if ($request->has('accion')) {
            if ($request->input('accion') === 'crear_relacion') {
                // Crear relación entre categoría y cargos seleccionados
                if ($request->has('selected_cargos')) {
                    foreach ($request->input('selected_cargos') as $cargoId) {
                        CategoriaCargo::create([
                            'categoria_id' => $categoria->id,
                            'cargo_id' => $cargoId,
                        ]);
                    }
                }

                // Crear relación entre categoría y nuevos cargos
                if ($request->has('codigo_cargo')) {
                    foreach ($request->codigo_cargo as $index => $codigoCargo) {
                        $cargo = Cargo::create([
                            'codigo' => $codigoCargo,
                            'descripcion' => $request->descripcion_cargo[$index],
                        ]);

                        CategoriaCargo::create([
                            'categoria_id' => $categoria->id,
                            'cargo_id' => $cargo->id,
                        ]);
                    }
                }

                return redirect()->route('categoria-cargo.indexcargocategoria')->with('success', 'Relación creada con éxito');
            } elseif ($request->input('accion') === 'crear_individual') {
                // Crear los cargos individualmente sin relación
                if ($request->has('codigo_cargo')) {
                    foreach ($request->codigo_cargo as $index => $codigoCargo) {
                        Cargo::create([
                            'codigo' => $codigoCargo,
                            'descripcion' => $request->descripcion_cargo[$index],
                        ]);
                    }
                }

                return redirect()->route('categoria-cargo.indexcargocategoria')->with('success', 'Cargos creados con éxito');
            }
        }

        // Si no se especificó ninguna acción válida, redireccionar con mensaje de error
        return redirect()->back()->with('error', 'Acción no válida');
    }
}
