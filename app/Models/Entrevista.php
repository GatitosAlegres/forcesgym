<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Vacante;
use App\Models\Curriculum;
use Buildix\Timex\Models\Event as TimexEvent;

class Entrevista extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function vacante()
    {
        return $this->belongsTo(Vacante::class);
    }

    public function curriculum()
    {
        return $this->belongsTo(Curriculum::class);
    }

    // Si el campo link es nulo, entonces se establecw un mensaje por defecto
    public function getLinkAttribute($value)
    {
        return $value ?? 'Entrevista presencial';
    }

    protected static function boot()
    {
        parent::boot();

        self::created(function ($entrevista) {     
            // Obtener la descripción del tipo de clase desde la tabla tipo_clases
            // Crear un registro en la tabla 'timex_events' con los datos de la clase
            TimexEvent::create([
                'subject' => $entrevista->comentario, // Usar la descripción del tipo de clase como subject
                'category' => 'primary', // Opcional: Puedes ajustar la categoría según tu lógica
                'end' => $entrevista->fecha,
                'start' => $entrevista->fecha,
                'startTime' => "08:00:00", // Hora de inicio de la clase
                'endTime' => "09:15:00", // Hora de fin de la clase
                'isAllDay' => false,
                'organizer' => '1', // ID del usuario organizador (ajusta según tu lógica)
            ]);
        });
    }
}
