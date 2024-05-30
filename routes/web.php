<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EntidadController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\IndustriaController;
use App\Http\Controllers\RecursoController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\TipoRecursoController;
 use App\Models\Empresa;
 use App\Models\Recurso;
 use App\Models\TipoRecurso;
 use App\Models\Estado;
 use Illuminate\Database\Eloquent\Model;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('cliente', ClienteController::class)->middleware(['auth', 'verified']);
Route::resource('empresa', EmpresaController::class)->middleware(['auth', 'verified']);
Route::resource('entidad', EntidadController::class)->middleware(['auth', 'verified']);
Route::resource('estado', EstadoController::class)->middleware(['auth', 'verified']);
Route::resource('industria', IndustriaController::class)->middleware(['auth', 'verified']);
Route::resource('recurso', RecursoController::class)->middleware(['auth', 'verified']);
Route::resource('reserva', ReservaController::class)->middleware(['auth', 'verified']);
Route::resource('tiporecurso', TipoRecursoController::class)->middleware(['auth', 'verified']);

// Ruta para mostrar el formulario de creación de una industria
Route::get('/industria/create', [IndustriaController::class, 'create'])->name('industria.create')->middleware(['auth', 'verified']);

// Ruta para guardar una nueva industria
Route::post('/industria', [IndustriaController::class, 'store'])->name('industria.store')->middleware(['auth', 'verified']);


Route::get('empresas/{id}/recursos', function ($id){
    $empresa = Empresa::find($id);
    return Recurso::where('empresa_id', $empresa->id)->get();
});

Route::get('recursos/{id}/estados', function ($id){
    $recurso = Recurso::find($id);
     return Estado::where('tipo_recurso_id', $recurso->tipo_recurso_id)->get();
});

Route::get('tiporecursos/{id}/estados', function ($id){
    $tiporecurso = TipoRecurso::find($id);
    return Estado::where('tipo_recurso_id', $tiporecurso->id)->get();
});

Route::get('empresas/{id}/tipoRecursos', function ($id){
    Empresa::where('empresas.empresa_id', $id);
    $tiposRecursos = TipoRecurso::select('tipo_recursos.id', 'tipo_recursos.nombre')
    ->distinct()
    ->join('recursos', 'tipo_recursos.id', '=', 'recursos.tipo_recurso_id')
    ->join('empresas', 'empresas.id', '=', 'recursos.empresa_id')
    ->where('empresas.id', $id)
    ->get();

    return $tiposRecursos;
});
