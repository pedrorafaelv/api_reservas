<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;

class Empresa extends Model
{
    protected $fillable = [
        'nombre', 'direccion', 'telefono', 'email', 'industria_id', 'fundacion', 'ingresos', 'sitio_web', 'descripcion', 'time_start', 'time_off'
    ];

    public function reservas()
    {
        return $this->hasMany(Reserva::class)->get();
    }

    public function recursos()
    {
        return $this->hasMany(Recurso::class)->get();
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
        $time_start = new DateTime($this->time_start);
        $time_off = new DateTime($this->time_off);
        $nH= $time_off->diff($time_start)->h;
        $tStart = $this->time_start;
        $availableHours=[];
        if ($nH == 0 ){
            $nH = 24;
            $tStart = "00:00";
        }
        if ($nH > 0) {
            for($i = 0; $i<$nH ; $i++){
                $availableHours[$i]= $tStart;
                $time_start->modify('+1 hour'); // Incrementamos la hora en 1 hora
                $tStart = $time_start->format('H:i:s'); // Actualizamos la hora de inicio
            }
        }
        return $availableHours;
    }

    /**
     * obtiene el formato de hora para la reservas, 4 horas, 1 hora,
    * 30 minutos, 15 minutos
     *
     * @return void
     */

}
