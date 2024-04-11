<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;


class Recurso extends Model
{
    use HasFactory;
    protected $fillable = [
        'empresa_id','tipo_recurso_id', 'nombre', 'estado_id', 'time_format_reserve',
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
    //Relación de uno a muchos inversa (relación polimorfica)
    public function tipo()
    {
        return $this->hasOne(tipoRecurso::class);
    }
    public function estado()
    {
        return $this->hasOne(Estado::class);
    }

    public function getRecursosXempresa( $empresa_id, $estado_id ){
        $recursos=  Recurso::where('empresa_id',$empresa_id)
        ->where('estado_id', $estado_id)
        ->get();
         return $recursos;
    }

    public function getXestado( $recurso_id, $estado_id, $fecha_inicio, $fecha_fin ){
        return  Reserva::where('recurso_id',$recurso_id)
        ->where('estado_id', $estado_id)
        ->whereDate('fecha_inicio','>=', $fecha_inicio)
        ->whereDate('fecha_fin','<=', $fecha_fin)
        ->get();
    }

}
