<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfertaLaboral extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function vacante()
    {
        return $this->belongsTo(Vacante::class);
    }
}
