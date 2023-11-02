<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function discount()
    {
        return $this->hasOne(Discount::class);
    }

    public function offer()
    {
        return $this->hasOne(Offer::class);
    }

    public function purchase_details()
    {
        return $this->hasMany(PurchaseDetail::class);
    }
}
