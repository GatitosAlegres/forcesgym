<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function evaluacion()
    {
        return $this->belongsTo(Evaluacion::class);
    }

    protected static function boot()
    {
        parent::boot();

        // Evento saving: se ejecuta antes de guardar el modelo
        static::saving(function ($resultado) {
            // Validar el puntaje y establecer el estado
            $resultado->estado = $resultado->puntaje < 70 ? false : true;
        });
    }
}
