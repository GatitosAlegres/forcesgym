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

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function offer()
    {
        return $this->hasOne(Offer::class);
    }

    public function purchase_details()
    {
        return $this->hasMany(PurchaseDetail::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function sale_details()
    {
        return $this->hasMany(SaleDetail::class);
    }
}
