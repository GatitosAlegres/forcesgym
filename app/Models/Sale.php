<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Sale extends Model
{
    use HasFactory;

    protected $guarded = [];

    /*public function user()
    {
        return $this->belongsTo(User::class);
    }*/

    public function saleDetails()
    {
        return $this->hasMany(SaleDetail::class);
    }

    public function clientes()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
}
