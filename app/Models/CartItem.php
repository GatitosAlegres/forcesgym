<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem
{
    public $product;
    public $quantity;
    public $price;

    public function __construct($product, $quantity, $price)
    {
        $this->product = $product;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    public function calculateSubtotal()
    {
        return $this->quantity * $this->price;
    }
}
