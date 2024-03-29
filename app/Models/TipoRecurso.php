<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoRecurso extends Model
{
    use HasFactory;
    protected $fillable = [
         'nombre'
    ];
    public function recursos()
    {
        return $this->hasMany(Recurso::class);
    }
}
