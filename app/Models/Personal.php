<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TipoPago;
use App\Models\Vacante;

class Personal extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tipoPago()
    {
        return $this->belongsTo(TipoPago::class);
    }

    public function area()
    {
        return $this->belongsTo(Vacante::class);
    }

    public function resultado()
    {
        return $this->belongsTo(Resultado::class);
    }
}
