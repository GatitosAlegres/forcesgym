<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassType extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_tipo_clase',
        'descripcion_tipo_clase',
    ];

    public function clases_entrenamiento()
    {
        return $this->hasMany(TrainingClass::class);
    }
}
