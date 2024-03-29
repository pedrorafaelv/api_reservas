<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Empresa extends Model
{
    protected $fillable = [
        'nombre', 'direccion', 'telefono', 'email', 'industria_id', 'fundacion', 'ingresos', 'sitio_web', 'descripcion',
    ];

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    public function recursos()
    {
        return $this->hasMany(Recurso::class);
    }

    /**
     * obtiene todos los dias de la semana que no estan disponibles para
     *
     * @return array
     */
    public function getNotAvailableDays (){
        //
        return array();

    }
    /**
     * obtener todos las fechas del año que no estan disponibles para
    *   la empresa .
     *
     * @return array
     */
    public function getNotAvailableDates (){
        //
        return array();

    }

    /**
     * Obtiene el horario dsiponible para los días laborales
     *
     * @return array
     */
    public function getAvailableHours (){
        return array();
    }

    /**
     * obtiene el formato de hora para la reservas, 4 horas, 1 hora,
    * 30 minutos, 15 minutos
     *
     * @return void
     */
    public function getformatTimeReserves (){
        return array();
    }
}
