<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $fillable = [
         'cliente_id','empresa_id', 'recurso_id', 'fecha_inicio', 'fecha_fin','estado_id'
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function recurso()
    {
        return $this->belongsTo(Recurso::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
}
