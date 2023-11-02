<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $guarded=[];


    public function asistencia_detalle()
    {
        return $this->hasMany(AssistanceDetail::class);
    }

    public function tipo_membresia()
    {
        return $this->belongsTo(MembershipType::class);
    }

}
