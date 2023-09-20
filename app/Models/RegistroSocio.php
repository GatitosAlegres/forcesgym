<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroSocio extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function promocion()
    {
        return $this->belongsTo(Promotion::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
