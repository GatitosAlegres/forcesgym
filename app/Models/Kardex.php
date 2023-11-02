<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kardex extends Model
{
    use HasFactory;

    protected $table = 'kardexs';

    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function responsible()
    {
        return $this->belongsTo(User::class);
    }

    public function productRecordSheet()
    {
        return $this->belongsTo(ProductRecordSheet::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    protected static function boot()
    {
        parent::boot();

        self::creating(function ($kardex) {
            $kardex->total_price = $kardex->unit_price * $kardex->quantity;
            $kardex->current_stock = $kardex->previous_stock + ($kardex->input_quantity - $kardex->output_quantity);
        });

        self::updating(function ($kardex) {
            $kardex->total_price = $kardex->unit_price * $kardex->quantity;
            $kardex->current_stock = $kardex->previous_stock + ($kardex->input_quantity - $kardex->output_quantity);
        });
    }
}
