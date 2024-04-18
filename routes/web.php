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
// Route::resource('industria', IndustriaController::class);

// Route::put('/industria/{industria}', 'IndustriaController@update')->name('industria.update');
// Route::resource('industria', IndustriaController::class);

// Ruta para mostrar el formulario de creación de una industria
Route::get('/industria/create', [IndustriaController::class, 'create'])->name('industria.create');

// Ruta para guardar una nueva industria
Route::post('/industria', [IndustriaController::class, 'store'])->name('industria.store');

// Ruta para mostrar los detalles de una industria específica
Route::get('/industria/{industria}', [IndustriaController::class, 'show'])->name('industria.show');

// Ruta para mostrar el formulario de edición de una industria
Route::get('/industria/{industria}/edit', [IndustriaController::class, 'edit'])->name('industria.edit');

// Ruta para actualizar una industria específica
Route::put('/industria/{industria}', [IndustriaController::class, 'update'])->name('industria.update');

// Ruta para eliminar una industria específica
Route::delete('/industria/{industria}', [IndustriaController::class, 'destroy'])->name('industria.destroy');



// Ruta para mostrar el formulario de creación de un recurso
// Route::get('/recurso/create', [RecursoController::class, 'create'])->name('recurso.create');

// // Ruta para guardar una nueva industria
// Route::post('/recurso', [RecursoController::class, 'store'])->name('recurso.store');

// // Ruta para mostrar los detalles de un recurso específica
// Route::get('/recurso/{recurso}', [RecursoController::class, 'show'])->name('recurso.show');

// // Ruta para mostrar el formulario de edición de un recurso
// Route::get('/recurso/{recurso}/edit', [RecursoController::class, 'edit'])->name('recurso.edit');

// // Ruta para actualizar un recurso específica
// Route::put('/recurso/{recurso}', [RecursoController::class, 'update'])->name('recurso.update');

// // Ruta para eliminar un recurso específica
// Route::delete('/recurso/{recurso}', [RecursoController::class, 'destroy'])->name('recurso.destroy');






 /**Crear una nueva Industria */
//  Route::put('industria/updIndustria/{id}/{nombre}', [IndustriaController::class, 'update']);

 /** actualizar una industria */
//  Route::put('industria/{id}', [IndustriaController::class, 'update']);
//  Route::patch('industria/{id}', [IndustriaController::class, 'edit']);

/** Crear una industria */
// Route::post('industria/newIndustria/{nombre}', [IndustriaController::class, 'store']);

/** Eliminar una industria */
// Route::delete('industria/delIndustria/{id}', [IndustriaController::class, 'destroy']);
/**-------------------------------------------------------------------------------------- */

/** ------------------------------ Tipo de recurso Routes ------------------------------*/

//Crear un tipo de recurso
// Route::post("/tipoRecurso/newTipoRecurso/{nombre}", [TipoRecursoController::class,"store"]);

//Crear un tipo de recurso
// Route::put("/tipoRecurso/updTipoRecurso/{id}/{nombre}", [TipoRecursoController::class,"update"]);

//Actualizar un tipo recurso
// Route::delete("/tipoRecurso/delTipoRecurso/{id}", [TipoRecursoController::class,"destroy"]);
/**-------------------------------------------------------------------------------------- */

/** --------------------------------- Cliente Routes --------------------------------------*/

/** Crear un nuevo cliente */
// Route::post('cliente/newCliente/{nombre}/{telefono}/{email}', [ClienteController::class, 'store']);

/** Actualizar un nuevo cliente */
// Route::put('cliente/updCliente/{id}/{nombre}/{telefono}/', [ClienteController::class, 'update']);

/** Eliminar un nuevo cliente */
// Route::delete('cliente/delCliente/{id}', [ClienteController::class, 'destroy']);

/**-------------------------------------------------------------------------------------- */

/** --------------------------------- Estado Routes --------------------------------------*/

// /**Crear un nuevo estado */
// Route::post('estado/newEstado/{entidad}/{nombre}', [EstadoController::class, 'store']);

// /** Actualizar un estado */
// Route::put('estado/updEstado/{id}/{entidad}/{nombre}', [EstadoController::class, 'update']);

// /** Eliminar un estado */
// Route::delete('estado/delEstado/{id}', [EstadoController::class, 'destroy']);
/**-------------------------------------------------------------------------------------- */

/**----------------------------------  Empresas Routes -----------------------------------*/

/** Listar empresas */
//  Route::get('/empresa/index', [EmpresaController::class, 'index'])->name('empresa.index');

 /**Crear una empresa */
//  Route::get('/empresa/create', [EmpresaController::class, 'create'])->name('empresa.create');

 /**Mostrar la informacion de una empresa en especifico */
//  Route::get('/empresa/show/{id}', [EmpresaController::class, 'show'])->name('empresa.show');

/**Eliminar una empresa */
//  Route::delete('empresa/delEmpresa/{id}', [EmpresaController::class, 'destroy']);

/**Modificar datos de una empresa */
//  Route::put('empresa/updEmpresa/{id}/{nombre}/{direccion}/{telefono}/{industria_id}/{fundacion}/{ingresos}/{sitio_web}/{descripcion}', [EmpresaController::class, 'update']);

/**-------------------------------------------------------------------------------------- */

/** --------------------------------- Recurso Routes --------------------------------------*/

//Obtener los recursos de una empresa
// Route::post("recurso/newRecurso/{empresa_id}/{tipo_recurso_id}/{nombre}/{estado_id}",[RecursoController::class,'store']);

//Actualizar un Recurso
// Route::put("/recurso/updRecurso/{id}/{empresa_id}/{tipo_recurso_id}/{nombre}/{estado_id}", [RecursoController::class,'update']);

//Eliminar un Recurso
// Route::delete("/recurso/delRecurso/{id}", [RecursoController::class,'destroy']);

//Activar/desactivar un Recurso
// Route::delete("/recurso/actRecurso/{id}", [RecursoController::class,'ActiveDeactiveRecurso']);

//Obtener los recursos de una empresa
// Route::get("recurso/getXEmpresa/{empresa_id}/{estado_id}",[RecursoController::class,'getXEmpresa']);

//Obtener la  de un recurso en un rango de fechas
// Route::get("recurso/getXEstado/{recurso_id}/{estado_id}/{fecha_inicio}/{fecha_fin}",[RecursoController::class,"getXestado"]);
/**-------------------------------------------------------------------------------------- */

/**-------------------------------  Reserva Routes ---------------------------------------*/

/**Crear un reserva */
// Route::post('reserva/newReserva/{cliente_id}/{empresa_id}/{recurso_id}/{fecha_inicio}/{fecha_fin}/{estado_id}', [ReservaController::class, 'store']);

 /**Actualizar un reserva */
// Route::put('reserva/updReserva/{id}/{cliente_id}/{recurso_id}/{fecha_inicio}/{fecha_fin}', [ReservaController::class, 'update']);

 /**Actualizar un reserva */
// Route::delete('reserva/delReserva/{id}', [ReservaController::class, 'destroy']);

/**Actualizar un reserva */
// Route::get('reserva/getReservaXRecurso/{recurso_id}', [ReservaController::class, 'getReservaXRecurso']);


/**Actualizar un reserva */
// Route::get('reserva/getReservaXEmpresa/{empresa_id}', [ReservaController::class, 'getReservaXEmpresa']);

/** Crea todas los registros de reservas para una empresa en una fecha determinada */
// Route::get('reserva/createReservasXdia/{empresa_id}/{fecha}', [ReservaController::class, 'createReservasXdia']);

/** Crea reserva por horas */
// Route::get('reserva/createReservasXhoras/{empresa_id}/{recurso_id}/{fecha_inicio}/{fecha_fin}/{estado_id}/{cliente_id}', [ReservaController::class, 'createReservasXhoras']);
/**-------------------------------------------------------------------------------------- */
