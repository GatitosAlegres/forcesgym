<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDeMembresia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_tipo_membresia',
        'precio',
    ];

    public function socios()
    {
        return $this->hasMany(Socio::class);
    }

}
