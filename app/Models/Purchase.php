<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function detalles()
    {
        return $this->hasMany(PurchaseDetail::class);
    }

    public function remision_guide()
    {
        return $this->belongsTo(RemisionGuide::class);
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function warranty()
    {
        return $this->belongsTo(Warranty::class);
    }

    public function credit_note()
    {
        return $this->hasMany(CreditNote::class);
    }
}
