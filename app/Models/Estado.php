<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;
    protected $fillable = [
         'entidad_id', 'nombre'
            ];

    public function recurso()
    {
        return $this->hasMany(Recurso::class);
    }
    public function reserva()
    {
        return $this->hasMany(reserva::class);
    }
    public function entidad()
    {
        return $this->belongsTo(Entidad::class);
    }
}
