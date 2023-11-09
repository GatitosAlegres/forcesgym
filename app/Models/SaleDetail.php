<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;

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

            /*$igvPercentage = 0.18;
            $saleDetail->igv_amount = $saleDetail->sub_amount * $igvPercentage;*/

            $sale = $saleDetail->sale;

            $sale->amount += $saleDetail->sub_amount;

            $product = $saleDetail->product;
            $product->stock -= $saleDetail->quantity;
            $sale->save();
            $productRecordSheet = ProductRecordSheet::where('product_id',$product->id )->first();
            Kardex::create([
                'code_item' => 'KAR-' . Date::now()->format('Y') . '-00000' . Kardex::count(),
                'created_at' => now(),
                'current_stock' => $saleDetail->product->stock - $saleDetail->quantity,
                'input_quantity' => 0,
                'movement_date' => now(),
                'output_quantity' => $saleDetail->quantity,
                'previous_stock' => $saleDetail->product->stock,
                'product_id' => $product->id,
                //'product_record_sheet_id' => ProductRecordSheet::where('product_id', $saleDetail->product_id)->first()->id,
                'product_record_sheet_id' => $productRecordSheet ? $productRecordSheet->id : null,
                'responsible_id' => auth()->user()->id ?? User::first()->id,

                //'responsible_id' => auth()->user()->id,

                'supplier_id' => $saleDetail->product->supplier->id,
                'total_price' => $saleDetail->sub_amount,

                'type_movement' => 'Salida',
                'unit_price' => $saleDetail->price_unitary,
            ]);
            $product->save();
        });

        self::updating(function($saleDetail){
            $saleDetail->sub_amount = $saleDetail->price_unitary * $saleDetail->quantity;

           /* $igvPercentage = 0.18;
            $saleDetail->igv_amount = $saleDetail->sub_amount * $igvPercentage;*/

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
