<?php

namespace App\Http\Controllers;

use App\Models\Departamento_Region;
use App\Models\Distrito;
use App\Models\Empresa;
use App\Models\Nacionalidad;
use App\Models\Provincia;
use App\Models\Sucursal;
use App\Models\SucursalEstablecimientoLaboral;
use App\Models\Tipo_Establecimiento;
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
    public function index(Request $request)
    {
        $query = Sucursal::query();
        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('nombre_sucursal', 'like', "%{$search}%")
                  ->orWhere('nombre_sucursal', 'like', "%{$search}%");
        }
        $sucursales = $query->paginate(5);

        if ($request->ajax()) {
            return response()->json([
                'view' => view('configuracion.sucursal.index', compact('sucursales'))->render(),
                'url' => route('sucursales.index', $request->query())
            ]);
        }

        return view('home')->with([
            'view' => 'configuracion.sucursal.index',
            'data' => compact('sucursales'),
        ]);
    }

    public function create(Request $request)
    {
        $empresas = Empresa::pluck('nombre_comercial', 'id');
        $departamentos = Departamento_Region::pluck('descripcion', 'id');
        $provincias = Provincia::pluck('descripcion', 'id');
        $distritos = Distrito::pluck('descripcion', 'id');
        $zonas = Zona::pluck('descripcion', 'id');
        $vias = Via::pluck('descripcion', 'id');
        $tipo_establecimientos = Tipo_Establecimiento::pluck('descripcion', 'id');


        if ($request->ajax()) {
            return response()->json([
                'view' => view('configuracion.sucursal.create', compact(
                    'empresas',
                    'departamentos',
                    'provincias',
                    'distritos',
                    'zonas',
                    'vias',
                    'tipo_establecimientos'
                ))->render(),
                'url' => route('sucursales.create', $request->query())
            ]);
        }

        return view('home')->with([
            'view' => 'configuracion.sucursal.create',
            'data' => compact(
                'empresas',
                'departamentos',
                'provincias',
                'distritos',
                'zonas',
                'vias',
                'tipo_establecimientos'
            ),
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'empresa_id' => 'required|exists:empresas,id',
            'nombre_sucursal' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'fax' => 'nullable|string|max:15',
            'email' => 'required|email|max:255',
            'fecha_inicio' => 'required|date',
            'departamento_id' => 'required|exists:departamento__regions,id',
            'provincia_id' => 'required|exists:provincias,id',
            'distrito_id' => 'required|exists:distritos,id',
            'zona_id' => 'required|exists:zonas,id',
            'via_id' => 'required|exists:vias,id',
            'des_direccion' => 'required|string|max:255',
            'estado' => 'boolean',
            'tasa_sctr_essalud' => 'required|numeric|min:0|max:100',
        ]);

        // Buscar el distrito por su ID
        $distrito = Distrito::find($request->distrito_id);

        // Verificar si el distrito existe
        if (!$distrito) {
            return redirect()->back()->withErrors(['distrito_id' => 'El distrito seleccionado no es válido.'])->withInput();
        }

        // Crear la sucursal
        $sucursal = new Sucursal();
        $sucursal->empresa_id = $request->empresa_id;
        $sucursal->nombre_sucursal = $request->nombre_sucursal;
        $sucursal->telefono = $request->telefono;
        $sucursal->fax = $request->fax;
        $sucursal->email = $request->email;
        $sucursal->fecha_inicio = $request->fecha_inicio;

        $sucursal->departamento_id = $request->departamento_id;
        $sucursal->provincia_id = $request->provincia_id;
        $sucursal->distrito_id = $request->distrito_id;
        $sucursal->zona_id = $request->zona_id;
        $sucursal->via_id = $request->via_id;
        $sucursal->des_direccion = $request->des_direccion;
        $sucursal->estado = $request->estado;
        $sucursal->tipo_establecimiento_id = $request->tipo_establecimiento_id;
        $sucursal->centro_riesgo = $request->centro_riesgo;
        $sucursal->denominacion_establecimiento = $request->nombre_sucursal;
        $sucursal->tasa_sctr_essalud = $request->tasa_sctr_essalud;


        // Obtener y asignar el código ubigeo del distrito
        $sucursal->codigo_ubigeo = $distrito->codigo;

        $sucursal->save();
        $sucursalEstablecimientoLaboral = new SucursalEstablecimientoLaboral();
        $sucursalEstablecimientoLaboral->sucursalpropio_id = $sucursal->id;
        $sucursalEstablecimientoLaboral->save();

        return redirect()->route('sucursales.index')->with('success', 'Sucursal creada exitosamente.');
    }


    public function show(Sucursal $sucursal)
    {
        return view('sucursales.show', compact('sucursal'));
    }

    public function edit(Sucursal $sucursale, Request $request)
    {
        $empresas = Empresa::pluck('nombre_comercial', 'id');
        $departamentos = Departamento_Region::pluck('descripcion', 'id');
        $provincias = Provincia::pluck('descripcion', 'id');
        $distritos = Distrito::pluck('descripcion', 'id');
        $zonas = Zona::pluck('descripcion', 'id');
        $vias = Via::pluck('descripcion', 'id');

        if ($request->ajax()) {
            return response()->json([
                'view' => view('configuracion.sucursal.edit', compact(
                    'sucursale',
                    'empresas',
                    'departamentos',
                    'provincias',
                    'distritos',
                    'zonas',
                    'vias'
                ))->render(),
                'url' => route('sucursales.edit', $request->query())
            ]);
        }

        return view('home')->with([
            'view' => 'configuracion.sucursal.edit',
            'data' => compact(
                'sucursale',
                'empresas',
                'departamentos',
                'provincias',
                'distritos',
                'zonas',
                'vias'
            ),
        ]);
    }

    public function update(Request $request, $id)
    {
        // Encuentra la sucursal por ID
        $sucursal = Sucursal::findOrFail($id);

        // Valida los datos del request
        $validatedData = $request->validate([
            'empresa_id' => 'required|exists:empresas,id',
            'nombre_sucursal' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'fax' => 'nullable|string|max:15',
            'email' => 'required|email|max:255',
            'fecha_inicio' => 'required|date',
            'departamento_id' => 'required|exists:departamento__regions,id',
            'provincia_id' => 'required|exists:provincias,id',
            'distrito_id' => 'required|exists:distritos,id',
            'zona_id' => 'required|exists:zonas,id',
            'via_id' => 'required|exists:vias,id',
            'des_direccion' => 'required|string|max:255',
            'estado' => 'boolean',
        ]);

        // Obtén el distrito para el código ubigeo
        $distrito = Distrito::find($request->distrito_id);
        if (!$distrito) {
            return redirect()->back()->withErrors(['distrito_id' => 'El distrito seleccionado no es válido.'])->withInput();
        }

        // Actualiza el código de ubigeo
        $validatedData['codigo_ubigeo'] = $distrito->codigo;

        // Actualiza la sucursal con los datos validados
        $sucursal->update($validatedData);

        // Redirige a la lista de sucursales con un mensaje de éxito
        return redirect()->route('sucursales.index')->with('success', 'Sucursal actualizada exitosamente.');
    }

    public function destroy(Sucursal $sucursal)
    {
        $sucursal->delete();
        return redirect()->route('sucursales.index')->with('success', 'Sucursal eliminada exitosamente.');
    }


    public function getSucursales($empresa_id)
    {
        $sucursales = Sucursal::where('empresa_id', $empresa_id)->pluck('nombre_sucursal', 'id');
        return response()->json($sucursales);
    }
}
