<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'clase_entrenamiento_id',
        'fecha',
        'estado',
    ];

    public function clase_entrenamiento()
    {
        return $this->belongsTo(ClasesEntrenamiento::class);
    }

    public function asistencia_detalle()
    {
        return $this->hasMany(AsistenciaDetalle::class);
    }

    public function AsistenciaDetalle()
    {
        return $this->hasMany(AsistenciaDetalle::class);
    }
}

