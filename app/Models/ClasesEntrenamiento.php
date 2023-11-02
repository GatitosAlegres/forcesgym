<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Asistencia;
use Buildix\Timex\Models\Event as TimexEvent;


class ClasesEntrenamiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'tipo_clase_id',
        'codigo',
        'descripcion',
        'fecha',
        'hora_inicio',
        'hora_fin',
        'activo',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    //conectar con timeX


    public function tipo_clase()
    {
        return $this->belongsTo(TipoClases::class);
    }

    public function asistencia()
    {
        // Verifica que la clave foránea 'clases_entrenamiento_id' sea la correcta
        return $this->hasOne(Asistencia::class, 'clase_entrenamiento_id');
    }
    protected static function boot()
    {
        parent::boot();


        self::created(function ($clase) {
            // Crear un registro de asistencia con los datos de la clase
            $asistencia = Asistencia::create([
                'clase_entrenamiento_id' => $clase->id,
                'fecha' => $clase->fecha,
                'estado' => $clase->activo,
            ]);

            // Obtener la descripción del tipo de clase desde la tabla tipo_clases
            $tipoClaseDescripcion = $clase->tipo_clase->nombre_tipo_clase;

            // Crear un registro en la tabla 'timex_events' con los datos de la clase
            TimexEvent::create([
                'subject' => $tipoClaseDescripcion, // Usar la descripción del tipo de clase como subject
                'category' => 'danger', // Opcional: Puedes ajustar la categoría según tu lógica
                'end' => $clase->fecha,
                'start' => $clase->fecha,
                'startTime' => $clase->hora_inicio,
                'endTime' => $clase->hora_fin,
                'isAllDay' => false,
                'organizer' => '1', // ID del usuario organizador (ajusta según tu lógica)
            ]);
        });

        self::deleting(function ($clase) {
            // Eliminar la asistencia asociada a la clase de entrenamiento
            $clase->asistencia()->delete();

            // Puedes realizar otras acciones necesarias antes de eliminar la clase
            // ...
        });
    }
}
