<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tipo_membresia_id',
        'descripcion',
        'fecha_inscripcion',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tipo_membresia()
    {
        return $this->belongsTo(TipoDeMembresia::class);
    }

}
