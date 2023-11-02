<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assistance extends Model
{
    use HasFactory;

    protected $fillable = [
        'clase_entrenamiento_id',
        'fecha',
        'estado',
    ];

    public function clase_entrenamiento()
    {
        return $this->belongsTo(TrainingClass::class);
    }

    public function asistencia_detalle()
    {
        return $this->hasMany(AssistanceDetail::class);
    }

    public function AssistanceDetail()
    {
        return $this->hasMany(AssistanceDetail::class);
    }
}
