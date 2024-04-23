<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\IndustriaController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\RecursoController;
use App\Http\Controllers\TipoRecursoController;

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


// Route::resource('reservas', ReservaController::class);
// // Route::resource('empresa', EmpresaController::class);

//  Route::resource('estado', EstadoController::class);
//  Route::resource('recurso', RecursoController::class);
//  Route::post('/recurso/index', [RecursoController::class, 'index'])->name('recursos.listado');
//  Route::resource('tipoRecurso', TipoRecursoController::class);





/** --------------------------------- Industria Routes --------------------------------------*/
Route::resource('cliente', ClienteController::class);
Route::resource('empresa', EmpresaController::class);
Route::resource('estado', EstadoController::class);
Route::resource('tiporecurso', TipoRecursoController::class);
Route::resource('recurso', RecursoController::class);
Route::resource('reserva', ReservaController::class);
Route::resource('industria', IndustriaController::class);

// Ruta para mostrar el formulario de creación de una industria
Route::get('/industria/create', [IndustriaController::class, 'create'])->name('industria.create');

// Ruta para guardar una nueva industria
Route::post('/industria', [IndustriaController::class, 'store'])->name('industria.store');
