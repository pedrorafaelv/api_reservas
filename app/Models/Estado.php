<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;
    protected $fillable = [
         'tipo_recurso_id', 'nombre'
            ];

    public function recurso()
    {
        return $this->hasMany(Recurso::class);
    }
    public function reserva()
    {
        return $this->hasMany(reserva::class);
    }
    public function tipoRecurso()
    {
        return $this->belongsTo(TipoRecurso::class);
    }
}
