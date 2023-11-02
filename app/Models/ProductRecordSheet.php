<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRecordSheet extends Model
{
    use HasFactory;

    protected $table = 'product_record_sheets';

    protected $guarded = [];

    public function kardex(){
        return $this->hasMany(Kardex::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
