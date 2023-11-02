<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TipoPago;
use App\Models\Vacante;

class Staff extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tipoPago()
    {
        return $this->belongsTo(PaymentType::class);
    }

    public function area()
    {
        return $this->belongsTo(Vacancy::class);
    }
}
