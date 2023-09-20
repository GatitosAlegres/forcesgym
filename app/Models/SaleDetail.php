<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    protected static function boot(){
        parent::boot();

        self::creating(function($saleDetail){
            $saleDetail->sub_amount = $saleDetail->price_unitary * $saleDetail->quantity;

            $sale = Sale::find($saleDetail->sale_id);

            $sale->amount += $saleDetail->sub_amount;

            $sale->save();
        });

        self::updating(function($saleDetail){
            $saleDetail->sub_amount = $saleDetail->price_unitary * $saleDetail->quantity;

            $sale = Sale::find($saleDetail->sale_id);

            $sale->amount += $saleDetail->sub_amount;

            $sale->save();
        });

        self::deleting(function($saleDetail){
            $sale = Sale::find($saleDetail->sale_id);

            $sale->amount -= $saleDetail->sub_amount;

            $sale->save();
        });
    }
}
