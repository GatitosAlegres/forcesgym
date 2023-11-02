<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function compra()
    {
        return $this->belongsTo(Purchase::class);
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
            
            $compra = Purchase::find($compradetalle->purchase_id);

            $compra->total_price += $compradetalle->total;

            $compra->save();
        });

        self::updating(function ($compradetalle) {
            $compradetalle->total = $compradetalle->unit_price * $compradetalle->quantity;

            $compra = Purchase::find($compradetalle->compra_id);

            $compra->total_price += $compradetalle->total;

            $compra->save();
        });

        self::deleting(function ($compradetalle) {
            $compra = Purchase::find($compradetalle->compra_id);

            $compra->total_price -= $compradetalle->total;

            $compra->save();
        });
    }
}
