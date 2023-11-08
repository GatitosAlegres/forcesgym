<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductRecordSheet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductRecordSheetSeeder extends Seeder
{
    
    public function run(): void
    {
        $products = Product::all();
        foreach ($products as $product) {
            $productRecordSheet = [
                'base_price' => $product->base_price,
                'category' => $product->category->name,
                'code_item' => 'HRMP-' . ProductRecordSheet::count() +1,
                'created_at' => now(),
                'description' => 'Este documento guarda los kardex del producto ' . $product->name .'.',
                'minimum_replacement_stock' => random_int(5, 15),
                'product_id' => $product->id,
                'replacement_quantity' => random_int(15, 20),
                'unit_of_measurement' => 'Unidad',
                'updated_at' => now(),
            ];
            ProductRecordSheet::create($productRecordSheet);
        }
    }
}
