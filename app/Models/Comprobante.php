<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comprobante extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function registro_socio()
    {
        return $this->belongsTo(RegistroSocio::class);
    }

}
