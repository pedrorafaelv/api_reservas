<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('fecha_no_entre_registros', function ($attribute, $value, $parameters, $validator) {
            $fechaInicio = $validator->getData()[$parameters[0]]; // Suponiendo que $parameters[0] es el nombre del campo fecha_inicio
            $fechaFin = $validator->getData()[$parameters[1]]; // Suponiendo que $parameters[1] es el nombre del campo fecha_fin

            // Verificar si hay algún registro existente con fechas que se superponen
            $existeRegistro = DB::table('reservas')
                                ->where(function ($query) use ($fechaInicio, $fechaFin) {
                                    $query->where('fecha_inicio', '<', $fechaInicio)
                                          ->where('fecha_fin', '>=', $fechaInicio)
                                          ->orWhere('fecha_inicio', '<', $fechaFin)
                                          ->where('fecha_fin', '>=', $fechaFin);
                                })
                                ->exists();

            return !$existeRegistro; // La validación pasa si no hay registros existentes con fechas superpuestas
        });

        Validator::extend('sin_reservas', function ($attribute, $value, $parameters, $validator) {
            // Verifica si existen dependencias en otra tabla
            // $registro = TablaPrincipal::where('tabla_secundaria_id', $value)->first();
            // var_dump('parameters = ',$parameters);
            // echo 'parameters ='; print_r($parameters); die(1);
            $id = $validator->getData()[$parameters[0]]; // Suponiendo que $parameters[0] es el nombre del campo fecha_inicio

            $existeReserva = DB::table('reservas')
            ->where(function ($query) use ($id) {
                $query->where('recurso_id', '=', $id);
            })
            ->exists();
            return !$existeReserva; // La validación pasa si no hay dependencias
        });


        Validator::extend('unique_combined', function ($attribute, $value, $parameters, $validator) {
            $table = $parameters[0];
            $column1 = $parameters[1];
            $column2 = $parameters[2];
            $exceptId = isset($parameters[3]) ? $parameters[3] : null;

            $query = DB::table($table)
                        ->where($column1, $value[0])
                        ->where($column2, $value[1]);

            if ($exceptId) {
                $query->where('id', '!=', $exceptId);
            }
            // print_r($query->exists());
            return $query->exists() ? false : true;
        });

    }


}
