<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;

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

            Kardex::create([
                'code_item' => 'KAR-' . Date::now()->format('Y') . '-00000' . Kardex::count(),
                'created_at' => now(),
                'current_stock' => $compradetalle->product->stock + $compradetalle->quantity,
                'document' => '',
                'input_quantity' => $compradetalle->quantity,
                'movement_date' => now(),
                'output_quantity' => 0,
                'previous_stock' => $compradetalle->product->stock,
                'product_id' => $compradetalle->product_id,
                'product_record_sheet_id' => ProductRecordSheet::where('product_id', $compradetalle->product_id)->first()->id,
                'responsible_id' => auth()->user()->id,
                'state' => '',
                'supplier_id' => $compradetalle->supplier_id,
                'total_price' => $compradetalle->total,
                'type_document' => 'Compra',
                'type_movement' => 'Entrada',
                'unit_price' => $compradetalle->unit_price,
                'updated_at' => now(),
            ]);

            $product = Product::find($compradetalle->product_id);
            $product->stock = $compradetalle->product->stock + $compradetalle->quantity;
            $product->save();
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
