<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AsistenciaDetalle extends Model
{
    use HasFactory;

    protected $fillable = [
        'clase_entrenamiento_id',
        'socio_id',
        'estado_asistencia',
        'asistencia_id',
    ];

    public function clase_entrenamiento()
    {
        return $this->belongsTo(ClasesEntrenamiento::class);
    }

    public function socio()
    {
        return $this->belongsTo(Socio::class);
    }

    //realacionar con asistencia
    public function asistencia()
    {
        return $this->belongsTo(Asistencia::class);
    }

    protected static function boot()
    {
        parent::boot();

        // Utiliza el evento 'creating' para establecer el valor de 'asistencia_id'
        static::creating(function ($model) {
            // Obtiene el ID de la asistencia correspondiente a través del ID de la clase de entrenamiento
            $asistenciaId = DB::table('asistencias')
                ->join('clases_entrenamientos', 'asistencias.clase_entrenamiento_id', '=', 'clases_entrenamientos.id')
                ->where('clases_entrenamientos.id', $model->clase_entrenamiento_id)
                ->value('asistencias.id');

            // Asigna el ID de la asistencia al modelo AsistenciaDetalle
            $model->asistencia_id = $asistenciaId;
        });
    }
}
