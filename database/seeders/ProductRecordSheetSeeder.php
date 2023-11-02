<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductRecordSheet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductRecordSheetSeeder extends Seeder
{
    
    //generar code item
    public function generateCodeItem($i)
    {
        if ($i < 10) {
            return 'HRM-00000000'.$i;
        }
        else{
            return 'HRM-0000000'.$i;
        }
    }

    public function run(): void
    {
        $products = Product::all();
        $i = 0;
        foreach ($products as $product) {
            $i++;
            $productRecordSheet = [
                'base_price' => $product->base_price,
                'category' => $product->category->name,
                'code_item' => ProductRecordSheetSeeder::generateCodeItem($i),
                'created_at' => now(),
                'description' => 'Hoja de registros de movimientos que almacenan los kardex del producto ' . $product->name,
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
