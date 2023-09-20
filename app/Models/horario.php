<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class horario extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function asesoramiento()
    {
        return $this->belongsTo(Asesoramiento::class);
    }
}
