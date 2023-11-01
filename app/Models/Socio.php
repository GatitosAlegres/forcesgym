<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
    use HasFactory;

    protected $guarded=[];


    public function asistencia_detalle()
    {
        return $this->hasMany(AsistenciaDetalle::class);
    }

    public function tipo_membresia()
    {
        return $this->belongsTo(TipoDeMembresia::class);
    }

}
