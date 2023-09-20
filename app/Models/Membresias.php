<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Membresias extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tipo_membresia_id',
        'descripcion',
        'precio',
        'activo',
        'fecha_inicio',
        'fecha_fin',
    ];

    // Define the relationship with the user model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with the membership_types model
    public function tipo_membresia()
    {
        return $this->belongsTo(TipoDeMembresia::class);
    }

    // Define the relationship with the socios model
    public function socio()
    {
        return $this->hasOne(Socio::class, 'membresias_id'); // Asegúrate de especificar la clave foránea correcta
    }

    protected static function boot()
    {
        parent::boot();

        self::created(function ($membresia) {
            // Crear un socio con los datos de la membresía
            $socio = $membresia->socio()->create([
                'user_id' => $membresia->user_id,
                'tipo_membresia_id' => $membresia->tipo_membresia_id,
                'descripcion' => $membresia->descripcion,
                'fecha_inscripcion' => $membresia->fecha_inicio,
            ]);
        });

        self::saving(function ($membresia) {
            // Obtener el tipo de membresía seleccionado
            $tipoMembresia = $membresia->tipo_membresia;

            if ($tipoMembresia) {
                // Asignar el precio del tipo de membresía a la membresía actual
                $membresia->precio = $tipoMembresia->precio;

                // Establecer la fecha de fin en base al tipo de membresía
                if ($tipoMembresia->nombre_tipo_membresia === 'Anual') {
                    $membresia->fecha_fin = Carbon::parse($membresia->fecha_inicio)->addYear();
                } elseif ($tipoMembresia->nombre_tipo_membresia === 'Mensual') {
                    $membresia->fecha_fin = Carbon::parse($membresia->fecha_inicio)->addMonth();
                } elseif ($tipoMembresia->nombre_tipo_membresia === 'Casual') {
                    $membresia->fecha_fin = Carbon::parse($membresia->fecha_inicio)->addDay();
                }
            }
        });
    }
}
