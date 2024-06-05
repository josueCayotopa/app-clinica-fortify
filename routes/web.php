<?php

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\UserControlles;
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

Route::get('/', function () {
    return view('welcome');
});




// usuarios 
Route::group(
    ['middleware' => 'auth'],
    function () {

        Route::get('/home/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home.dashboard');
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
        Route::get('get-provincias', [EmpresaController::class, 'getProvincias'])->name('getProvincias');
        Route::get('get-distritos', [EmpresaController::class, 'getDistritos'])->name('getDistritos');
        Route::resource('sucursales', SucursalController::class);
    }
);

// permisos

//roles


///Empleados


Route::get('/too-many-requests', function (Request $request) {
    return view('errors.429', ['retry_after' => $request->query('retry_after', 60)]);
})->name('tooManyRequests');
