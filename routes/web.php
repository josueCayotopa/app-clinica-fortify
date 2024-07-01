<?php

use App\Http\Controllers\AfpsdescuentosController;
use App\Http\Controllers\AsignarVacacionesController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\CalendarioVacacionesController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\CargosCategoriasController;
use App\Http\Controllers\CategoriaCargoController;
use App\Http\Controllers\ConceptoController;
use App\Http\Controllers\ConocimientoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\FormulaController;
use App\Http\Controllers\InstitucionController;
use App\Http\Controllers\PensionistaController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\ProfesionController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\SolicitudLicenciasController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\TipoTrabajadorIpssController;
use App\Http\Controllers\UbigeoController;
use App\Http\Controllers\UITController;
use App\Http\Controllers\UserControlles;
use App\Http\Controllers\ZonaController;
use App\Models\CargoCategoria;
use App\Models\SolicitudLicencias;
use App\Models\Sucursal;
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

        Route::resource('sucursales', SucursalController::class);
        Route::resource('pensionistas', PensionistaController::class);
        Route::resource('uits', UITController::class);
        // rutas para ubigeo
        Route::get('/get-provincias/{departamento_id}', [UbigeoController::class, 'getProvincias'])->name('getProvincias');
        Route::get('/get-distritos/{provincia_id}', [UbigeoController::class, 'getDistritos'])->name('getDistritos');

        // rutas para tipo trabajador ipss
        Route::resource('tipo_trabajador_ipsses', TipoTrabajadorIpssController::class);

        


        // empleado
        Route::resource('personals', PersonalController::class);
        ///Empleados

        ////Planillas
        /////Conocimientos
        Route::get('/empleados/planillas/conocimiento',[ConocimientoController::class, 'index'])->name('conocimiento.index');
        Route::post('/empleados/planillas/conocimiento',[ConocimientoController::class, 'store'])->name('conocimiento.store');
        Route::post('/conocimiento/{id}', [ConocimientoController::class, 'update'])->name('conocimiento.update');
        Route::delete('/conocimiento/{conocimiento}',[ConocimientoController::class, 'destroy'])->name('conocimiento.delete');

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
        Route::get('/categoria/{id}/cargos', [CategoriaCargoController::class, 'getCargos'])->name('categoria-cargos.get-cargos');
        Route::get('/vista-categoria', [CategoriaCargoController::class, 'index'])->name('categoria-cargo.indexcargocategoria');
        Route::delete('/categoria-cargos/{id}', [CategoriaCargoController::class, 'destroy'])->name('categoria-cargos.destroy');
        Route::get('/editar-relacion-categoria-cargo/{id}', [CategoriaCargoController::class, 'edit'])->name('editar-relacion-categoria-cargo');
        Route::put('/actualizar-relacion-categoria-cargo/{id}', [CategoriaCargoController::class, 'update'])->name('actualizar-relacion-categoria-cargo');
        Route::get('categoria-cargo/crear', [CategoriaCargoController::class, 'create'])->name('crear-relacion-categoria-cargo');
        Route::post('categoria-cargo', [CategoriaCargoController::class, 'store'])->name('guardar-relacion-categoria-cargo');
        Route::delete('/categoria-cargos/{id}', [CategoriaCargoController::class, 'Categoriadestroy'])->name('categorias.destroy');
        Route::delete('/eliminar-cargo/{cargo}', [CategoriaCargoController::class,'eliminarCargo'])->name('eliminar-cargo');
        // cargos y categorias Josue 

       
        // afp y tipo de descuento
        Route::get('/empleados/maestros/descuentoAfp', [AfpsdescuentosController::class, 'index'])->name('afp.descuentos.index');
        Route::get('afp-descuentos/{id}/editar', [AfpsdescuentosController::class, 'edit'])->name('editar.afp.descuento');
        Route::put('afp-descuentos/{id}', [AfpsdescuentosController::class, 'update'])->name('actualizar.afp.descuento');
        Route::delete('/afpDescuentos/{id}', [AfpsdescuentosController::class, 'destroy'])->name('afpDescuentos.destroy');
        Route::get('/afp/descuentos/create', [AfpsdescuentosController::class, 'create'])->name('afp.descuentos.create');
        Route::post('/afp/descuentos', [AfpsdescuentosController::class, 'store'])->name('afp.descuentos.store');

        //Fromulas

        Route::resource('formulas', FormulaController::class);
        // conceptos
        Route::resource('conceptos', ConceptoController::class);





        //Vacciones

        /// Asignar vacaciones

        Route::get('/vacaciones/asignar', [AsignarVacacionesController::class, 'index'])->name('vacaciones.asignar.index');


        ///Calendario vaciones

        Route::get('/vacaciones/calendario', [CalendarioVacacionesController::class, 'index'])->name('vacaciones.calendario.index');

    


        // Solicitud de Licencias 
        Route::resource('solicitud_licencias',SolicitudLicenciasController::class);

        //ruta para asistencia
        // routes/web.php
        Route::get('/asistenciaa', [AsistenciaController::class, 'index'])->name('asistencia.index');

        //numero de ususarios

        //pensionistas
        Route::get('/pensionistas', [PensionistaController::class,'index'])->name('pensionistas.index');

        //create pensionista
        
        Route::get('/pensionistas/create', [PensionistaController::class,'create'])->name('pensionistas.create');
        
        Route::post('/pensionistas', [PensionistaController::class,'store'])->name('pensionistas.store');
    }
);

Route::get('/too-many-requests', function (Request $request) {
    return view('errors.429', ['retry_after' => $request->query('retry_after', 60)]);
})->name('tooManyRequests');
