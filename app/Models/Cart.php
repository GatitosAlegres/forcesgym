<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart
{
    private $items = array();

    public function __construct()
    {
    }

    public function getItems()
    {
        return $this->items;
    }

    public function addItem($product, $quantity, $price)
    {
        $item = new CartItem($product, $quantity, $price);
        $this->items[] = $item;
    }

    public function updateItem($product_id, $quantity)
    {
        if (count($this->items) > 0) {
            foreach ($this->items as $item) {
                if ($item->product->id == $product_id) {
                    $item->quantity = $quantity;
                }
            }
        }
    }

    public function findItem($product_id)
    {
        if (count($this->items) > 0) {
            foreach ($this->items as $item) {
                if ($item->product->id == $product_id) {
                    return $item;
                }
            }
        }
        return null;
    }

    public function wasAdded($product_id)
    {
        if (count($this->items) > 0) {
            foreach ($this->items as $item) {
                if ($item->product->id == $product_id) {
                    return true;
                }
            }
        }
        return false;
    }

    public function removeItem($product_id)
    {
        if (count($this->items) > 0) {
            foreach ($this->items as $key => $item) {
                if ($item->product->id == $product_id) {
                    unset($this->items[$key]);
                }
            }
        }
    }

    public function calculateTotal()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->calculateSubtotal();
        }
        return $total;
    }
}
