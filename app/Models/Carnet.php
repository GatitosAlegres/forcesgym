<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carnet extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function registroSocio()
    {
        return $this->belongsTo(RegistroSocio::class);
    }

    public function horario()
    {
        return $this->belongsTo(horario::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }


}
