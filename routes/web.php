<?php

use App\Exports\EmpresaExport;
use App\Http\Controllers\AfpDescuentosPensionesController;
use App\Http\Controllers\AfpsdescuentosController;
use App\Http\Controllers\AsignarVacacionesController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\CalendarioVacacionesController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\CargosCategoriasController;
use App\Http\Controllers\CategoriaCargoController;
use App\Http\Controllers\ConceptoController;
use App\Http\Controllers\ConceptoSunatController;
use App\Http\Controllers\ConocimientoController;
use App\Http\Controllers\DatosPersonalController;
use App\Http\Controllers\DerechoHabientesController;
use App\Http\Controllers\DescuentoRegimemPencionarioController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\FormulaController;
use App\Http\Controllers\InstitucionController;
use App\Http\Controllers\ModalidadFormativaController;
use App\Http\Controllers\OcupacionController;
use App\Http\Controllers\PensionistaController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\ProfesionController;
use App\Http\Controllers\RegimenPencionarioController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\SolicitudLicenciasController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\TipoTrabajadorController;
use App\Http\Controllers\TipoTrabajadorIpssController;
use App\Http\Controllers\TrabajadorController;
use App\Http\Controllers\TrabajadorCuartaCategoriaController;
use App\Http\Controllers\UbigeoController;
use App\Http\Controllers\UITController;
use App\Http\Controllers\UserControlles;
use App\Http\Controllers\ZonaController;
use App\Http\Livewire\PensionRegimes;
use App\Http\Livewire\RegimenAfpCrud;
use App\Http\Livewire\TipoDescuento;
use App\Models\AfpDescuentosPensiones;
use App\Models\CargoCategoria;
use App\Models\ConceptoSunat;
use App\Models\ModaliadFormativa;
use App\Models\ModalidadFormativa;
use App\Models\Ocupacion;
use App\Models\RegimenPencionario;
use App\Models\SolicitudLicencias;
use App\Models\Sucursal;
use App\Models\Tipo_trabajador;
use Database\Seeders\OcupacionSeeder;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/






// usuarios
Route::group(
    ['middleware' => 'auth'],
    function () {

        Route::get('/', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('home.dashboard');
        // Route::get('/home/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home.dashboard.onlineusers');
        Route::get('/users/create', [UserControlles::class, 'create'])->name('users.create');
        Route::post('/users', [UserControlles::class, 'store'])->name('users.store');
        Route::get('/users/index', [UserControlles::class, 'index'])->name('users.index');
        Route::get('/users/search', [UserControlles::class, 'search'])->name('users.search');
        Route::get('/users/{user}', [UserControlles::class, 'show'])->name('users.show');
        Route::get('/users/{user}/edit', [UserControlles::class, 'edit'])->name('users.edit');

        Route::put('/users/{user}', [UserControlles::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserControlles::class, 'destroy'])->name('users.delete');
        Route::resource('permissions', PermissionController::class);
        Route::resource('roles', RolController::class);

        Route::get('/home/empleados/empleado', [EmpleadoController::class, 'index'])->name('empleado.index');
        Route::resource('empresas', EmpresaController::class);
        Route::get('/exportar/empresa', [ExportController::class, 'export'])->name('exportar.empresa');

        Route::resource('sucursales', SucursalController::class);
        Route::resource('pensionistas', PensionistaController::class);
        Route::resource('uits', UITController::class);
        // rutas para ubigeo
        Route::get('/get-provincias/{departamento_id}', [UbigeoController::class, 'getProvincias'])->name('getProvincias');
        Route::get('/get-distritos/{provincia_id}', [UbigeoController::class, 'getDistritos'])->name('getDistritos');
        Route::get('/get-sucursales/{empresa_id}', [UbigeoController::class, 'getSucursalesByEmpresa']);

        Route::get('/get-ocupaciones/{tipo_trabajador_id}', [UbigeoController::class, 'getOcupacionesByTipoTrabajador']);
        // rutas para tipo trabajador ipss
        Route::resource('tipo_trabajador_ipsses', TipoTrabajadorIpssController::class);

        //ruta para asistencia
        // routes/web.php
        Route::get('/asistenciaa', [AsistenciaController::class, 'index'])->name('asistencia.index');


        // empleado
        Route::resource('personals', PersonalController::class);
        ///Empleados

        ////Planillas
        /////Conocimientos
        Route::get('/empleados/planillas/conocimiento', [ConocimientoController::class, 'index'])->name('conocimiento.index');
        Route::post('/empleados/planillas/conocimiento', [ConocimientoController::class, 'store'])->name('conocimiento.store');
        Route::post('/conocimiento/{id}', [ConocimientoController::class, 'update'])->name('conocimiento.update');
        Route::delete('/conocimiento/{conocimiento}', [ConocimientoController::class, 'destroy'])->name('conocimiento.delete');

        /////Profesiones

        Route::get('/empleados/planillas/profesiones', [ProfesionController::class, 'index'])->name('profesion.index');
        Route::post('/empleados/planillas/profesiones', [ProfesionController::class, 'store'])->name('profesion.store');
        Route::delete('/profesion/{profesion}', [ProfesionController::class, 'destroy'])->name('profesion.delete');
        Route::post('/profesion/{id}', [ProfesionController::class, 'update'])->name('profesion.update');


        /////Zonas

        Route::get('/empleados/planillas/zona', [ZonaController::class, 'index'])->name('zona.index');
        Route::post('/empleados/planillas/zona', [ZonaController::class, 'store'])->name('zona.store');
        Route::delete('/zona/{zona}', [ZonaController::class, 'destroy'])->name('zona.delete');
        Route::post('/zona/{id}/edit', [ZonaController::class, 'update'])->name('zona.update');



        /////Institución
        Route::get('/empleados/planillas/institucion', [InstitucionController::class, 'index'])->name('institucion.index');
        Route::post('/empleados/planillas/institucion', [InstitucionController::class, 'store'])->name('institucion.store');
        Route::delete('/institucion/{institucion}', [InstitucionController::class, 'destroy'])->name('institucion.delete');
        Route::post('/institucion/{id}/edit', [InstitucionController::class, 'update'])->name('institucion.update');


        Route::resource('cargos', CargoController::class);
        // cargo y Categorias
        // Tipo de trabajador y ocupaciones  Josue 
        Route::resource('tipo_trabajadores', TipoTrabajadorController::class);
        Route::get('/tipos-trabajador/{id}/ocupaciones', [TipoTrabajadorController::class, 'getOcupaciones']);
        Route::delete('/ocupaciones/{ocupacion}', [OcupacionController::class, 'destroy'])->name('ocupaciones.destroy');


        // afp y tipo de descuento


        Route::get('/regimen_pensionarios', function () {
            return view('regimen_pensionarios.indexliveware');
        })->name('regimen_pensionarios.index');
        Route::get('/tipo_regimen', function () {
            return view('regimen_pensionarios.indexafp');
        })->name('tipo_regimen.index');
        Route::get('/descuento_pensiones', function () {
            return view('regimen_pensionarios.indexdescuentos');
        })->name('descuento_pensiones.index');
        Route::get('/descuento_pensiones', function () {
            return view('regimen_pensionarios.indexdescuentos');
        })->name('descuento_pensiones.index');





        Route::resource('descuentos_pensiones', AfpDescuentosPensionesController::class);
        Route::resource('tipos_descuento', DescuentoRegimemPencionarioController::class);
        Route::get('/afps-by-regimen', [UbigeoController::class, 'getAfpsByRegimen']);
        Route::post('/tipos_descuento/create', [DescuentoRegimemPencionarioController::class, 'storeall'])->name('tipos_descuento.storeall');

        //   DESCUENTOS REGMINE PENSIONARIO  



        Route::get('/regimen-afps', RegimenAfpCrud::class)->name('regimen-afps.index');
        //Fromulas
        Route::resource('formulas', FormulaController::class);
        // conceptos
        Route::resource('conceptos', ConceptoSunatController::class);
        //  personal 
        Route::resource('datos_personales', DatosPersonalController::class);
        Route::resource('trabajadores', TrabajadorController::class);
        Route::resource('modalidad_formativa', ModalidadFormativaController::class);
        // agregar hijos 
        Route::resource('familia', DerechoHabientesController::class);
        Route::get('asistencias', [AsistenciaController::class, 'index'])->name('asistencias.index');
        Route::post('asistencias/marcar-todos', [AsistenciaController::class, 'marcarTodos'])->name('asistencias.marcarTodos');







        //Vacciones

        /// Asignar vacaciones

        //Route::get('/vacaciones/asignar', [AsignarVacacionesController::class, 'index'])->name('vacaciones.asignar.index');

        Route::resource('vacaciones', AsignarVacacionesController::class);

        ///Calendario vaciones

        //Route::get('/vacaciones/calendario', [CalendarioVacacionesController::class, 'index'])->name('vacaciones.calendario.index');

        Route::resource('calendario', CalendarioVacacionesController::class);

        // Solicitud de Licencias 
        Route::resource('solicitud_licencias', SolicitudLicenciasController::class);


        //numero de ususarios


        //Cuarta categoria

        Route::resource('cuarta_categoria', TrabajadorCuartaCategoriaController::class);
    }
);

Route::get('/too-many-requests', function (Request $request) {
    return view('errors.429', ['retry_after' => $request->query('retry_after', 60)]);
})->name('tooManyRequests');
