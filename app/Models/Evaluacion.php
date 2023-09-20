<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\TipoEvaluacion;
use App\Models\Entrevista;
use Buildix\Timex\Models\Event as TimexEvent;

class Evaluacion extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tipoEvaluacion()
    {
        return $this->belongsTo(TipoEvaluacion::class);
    }

    public function entrevista()
    {
        return $this->belongsTo(Entrevista::class);
    }

    protected static function boot()
    {
        parent::boot();

        self::created(function ($evaluacion) {     
            // Obtener la descripción del tipo de clase desde la tabla tipo_clases
            // Crear un registro en la tabla 'timex_events' con los datos de la clase
            TimexEvent::create([
                'subject' => $evaluacion->comentario, // Usar la descripción del tipo de clase como subject
                'category' => 'primary', // Opcional: Puedes ajustar la categoría según tu lógica
                'end' => $evaluacion->fecha,
                'start' => $evaluacion->fecha,
                'startTime' => "08:00:00", // Hora de inicio de la clase
                'endTime' => "09:15:00", // Hora de fin de la clase
                'isAllDay' => false,
                'organizer' => '1', // ID del usuario organizador (ajusta según tu lógica)
            ]);
        });
    }
}
