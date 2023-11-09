<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AssistanceDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'socio_id',
        'estado_asistencia',
        'assistance_id',
    ];


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


    }
}
