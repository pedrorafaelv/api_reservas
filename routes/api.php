<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmpresaController;
use App\Http\Controllers\Api\EstadoController;
use App\Http\Controllers\Api\ClienteController;
use App\Http\Controllers\Api\IndustriaController;
use App\Http\Controllers\Api\RecursoController;
use App\Http\Controllers\Api\ReservaController;
use App\Http\Controllers\Api\TipoRecursoController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/** --------------------------------- Industria Routes --------------------------------------*/
Route::resource('Industria', IndustriaController::class)->except([ 'create', 'edit' ]);

/** actualizar una industria */
Route::put('Industria/updIndustria/{id}/{nombre}', [IndustriaController::class, 'update']);

/** Crear una industria */
Route::post('Industria/newIndustria/{nombre}', [IndustriaController::class, 'store']);

/** Eliminar una industria */
Route::delete('Industria/delIndustria/{id}', [IndustriaController::class, 'destroy']);
/**-------------------------------------------------------------------------------------- */

/** ------------------------------ Tipo de recurso Routes ------------------------------*/
Route::resource('TipoRecurso', TipoRecursoController::class)->except([ 'create', 'edit' ]);

//Crear un tipo de recurso
Route::post("/TipoRecurso/newTipoRecurso/{nombre}", [TipoRecursoController::class,"store"]);

//Crear un tipo de recurso
Route::put("/TipoRecurso/updTipoRecurso/{id}/{nombre}", [TipoRecursoController::class,"update"]);

//Actualizar un tipo recurso
Route::delete("/TipoRecurso/delTipoRecurso/{id}", [TipoRecursoController::class,"destroy"]);
/**-------------------------------------------------------------------------------------- */

/** --------------------------------- Cliente Routes --------------------------------------*/
Route::resource('Cliente', ClienteController::class)->except([ 'create', 'edit' ]);

/** Crear un nuevo cliente */
Route::post('Cliente/newCliente/{nombre}/{telefono}/{email}', [ClienteController::class, 'store']);

/** Actualizar un nuevo cliente */
Route::put('Cliente/updCliente/{id}/{nombre}/{telefono}/', [ClienteController::class, 'update']);

/** Eliminar un nuevo cliente */
Route::delete('Cliente/delCliente/{id}', [ClienteController::class, 'destroy']);

/**-------------------------------------------------------------------------------------- */

/** --------------------------------- Estado Routes --------------------------------------*/
Route::resource('Estado', EstadoController::class)->except([ 'create', 'edit' ]);

/**Crear un nuevo estado */
Route::post('Estado/newEstado/{entidad_id}/{nombre}', [EstadoController::class, 'store']);

/** Actualizar un estado */
Route::put('Estado/updEstado/{id}/{entidad_id}/{nombre}', [EstadoController::class, 'update']);

/** Eliminar un estado */
Route::delete('Estado/delEstado/{id}', [EstadoController::class, 'destroy']);
/**-------------------------------------------------------------------------------------- */

/**----------------------------------  Empresas Routes -----------------------------------*/
Route::resource('Empresa', EmpresaController::class)->except([ 'create','edit' ]);

/** Guardar empresa */
Route::post('Empresa/newEmpresa/{nombre}/{direccion}/{telefono}/{email}/{industria_id}/{fundacion}/{ingresos}/{sitio_web}/{descripcion}', [EmpresaController::class, 'store']);

/** Actualizar una empresa */
Route::put('Empresa/updEmpresa/{id}/{nombre}/{direccion}/{telefono}/{industria_id}/{fundacion}/{ingresos}/{sitio_web}/{descripcion}', [EmpresaController::class, 'update']);

/** Eliminar empresa */
Route::delete('Empresa/delEmpresa/{id}', [EmpresaController::class, 'destroy']);

// Obtener las empresas por el nombre
Route::get("Empresa/getEmpresasXNombre/{nombre}", [EmpresaController::class, 'getXNombre']);

//obtener empresas por industrias
Route::get("Empresa/getEmpresaXIndustria/{industria_id}", [EmpresaController::class, 'getXIndustria']);
/**-------------------------------------------------------------------------------------- */

/** --------------------------------- Recurso Routes --------------------------------------*/
Route::resource('Recurso', RecursoController::class)->except([ 'create','edit' ]);

//Obtener los recursos de una empresa
Route::post("Recurso/newRecurso/{empresa_id}/{tipo_recurso_id}/{nombre}/{estado_id}",[RecursoController::class,'store']);

//Actualizar un Recurso
Route::put("/Recurso/updRecurso/{id}/{empresa_id}/{tipo_recurso_id}/{nombre}/{estado_id}", [RecursoController::class,'update']);

//Eliminar un Recurso
Route::delete("/Recurso/delRecurso/{id}", [RecursoController::class,'destroy']);

//Activar/desactivar un Recurso
Route::delete("/Recurso/actRecurso/{id}", [RecursoController::class,'ActiveDeactiveRecurso']);

//Obtener los recursos de una empresa
Route::get("Recurso/getXEmpresa/{empresa_id}/{estado_id}",[RecursoController::class,'getXEmpresa']);

//Obtener la  de un recurso en un rango de fechas
Route::get("Recurso/getXEstado/{recurso_id}/{estado_id}/{fecha_inicio}/{fecha_fin}",[RecursoController::class,"getXestado"]);
/**-------------------------------------------------------------------------------------- */

/**-------------------------------  Reserva Routes ---------------------------------------*/
Route::resource('Reserva', ReservaController::class)->except(['create', 'edit' ]);

/**Crear un reserva */
Route::post('Reserva/newReserva/{cliente_id}/{empresa_id}/{recurso_id}/{fecha_inicio}/{fecha_fin}/{estado_id}', [ReservaController::class, 'store']);

 /**Actualizar un reserva */
Route::put('Reserva/updReserva/{id}/{cliente_id}/{recurso_id}/{fecha_inicio}/{fecha_fin}', [ReservaController::class, 'update']);

 /**Actualizar un reserva */
Route::delete('Reserva/delReserva/{id}', [ReservaController::class, 'destroy']);

/**Actualizar un reserva */
Route::get('Reserva/getReservaXRecurso/{recurso_id}', [ReservaController::class, 'getReservaXRecurso']);

/**Actualizar un reserva */
Route::get('Reserva/getReservaXEmpresa/{empresa_id}', [ReservaController::class, 'getReservaXEmpresa']);

/** Crea todas los registros de reservas para una empresa en una fecha determinada */
Route::get('Reserva/createReservasXdia/{empresa_id}/{fecha}', [ReservaController::class, 'createReservasXdia']);

/** Crea reserva por horas */
Route::get('Reserva/createReservasXhoras/{empresa_id}/{recurso_id}/{fecha_inicio}/{fecha_fin}/{estado_id}/{cliente_id}', [ReservaController::class, 'createReservasXhoras']);
/**-------------------------------------------------------------------------------------- */

/** Cualquier otra ruta que no esté definida */
Route::fallback(function () {
    return response()->json(['message' => 'Ruta no encontrada'], Response::HTTP_NOT_FOUND);
});
