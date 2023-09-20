<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function detalles()
    {
        return $this->hasMany(Compradetalle::class);
    }

    public function guia_remision()
    {
        return $this->belongsTo(GuiaRemision::class);
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function warranty()
    {
        return $this->belongsTo(Warranty::class);
    }
}
