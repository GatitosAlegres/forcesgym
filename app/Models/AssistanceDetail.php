<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AssistanceDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'clase_entrenamiento_id',
        'socio_id',
        'estado_asistencia',
        'assistance_id',
    ];

    public function clase_entrenamiento()
    {
        return $this->belongsTo(TrainingClass::class);
    }

    public function socio()
    {
        return $this->belongsTo(Partner::class);
    }

    //realacionar con asistencia
    public function asistencia()
    {
        return $this->belongsTo(Assistance::class);
    }

    protected static function boot()
    {
        parent::boot();

        // Utiliza el evento 'creating' para establecer el valor de 'assistance_id'
        static::creating(function ($model) {
            // Obtiene el ID de la asistencia correspondiente a través del ID de la clase de entrenamiento
            $asistenciaId = DB::table('assistances')
                ->join('training_classes', 'assistances.clase_entrenamiento_id', '=', 'training_classes.id')
                ->where('training_classes.id', $model->clase_entrenamiento_id)
                ->value('assistances.id');

            // Asigna el ID de la asistencia al modelo AssistanceDetail
            $model->assistance_id = $asistenciaId;
        });
    }
}
