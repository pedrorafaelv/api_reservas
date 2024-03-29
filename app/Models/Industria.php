<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industria extends Model
{
    use HasFactory;
    protected $fillable = [
         'nombre',
            ];

    public function empresa()
    {
        return $this->hasOne(Empresa::class);
    }


}
