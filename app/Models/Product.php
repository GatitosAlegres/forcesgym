<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['image_url'];
    
    public function getImageUrlAttribute()
    {
        if(!is_null($this->image)){
            return Storage::url($this->image);
        }

        return null;
    }

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
