<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compradetalle extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function compra()
    {
        return $this->belongsTo(Compra::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    protected static function boot()
    {
        parent::boot();

        self::creating(function ($compradetalle) {
            $compradetalle->total = $compradetalle->unit_price * $compradetalle->quantity;

            $compra = Compra::find($compradetalle->compra_id);

            $compra->total_price += $compradetalle->total;

            $compra->save();
        });

        self::updating(function ($compradetalle) {
            $compradetalle->total = $compradetalle->unit_price * $compradetalle->quantity;

            $compra = Compra::find($compradetalle->compra_id);

            $compra->total_price += $compradetalle->total;

            $compra->save();
        });

        self::deleting(function ($compradetalle) {
            $compra = Compra::find($compradetalle->compra_id);

            $compra->total_price -= $compradetalle->total;

            $compra->save();
        });
    }
}
