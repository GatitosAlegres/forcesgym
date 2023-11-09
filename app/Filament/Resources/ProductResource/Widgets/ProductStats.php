<?php

namespace App\Filament\Resources\ProductResource\Widgets;

use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class ProductStats extends BaseWidget
{
    protected static ?int $sort = 0;

    protected function getCards(): array
    {
        return [
            Card::make('Productos Registrados', Product::count()),
            Card::make('Stock Total de Productos', Product::sum('stock')),
            Card::make('Ganancia Esperada', number_format(Product::sum('sale_price') - Product::sum('purchase_price'), 2, ',', '.')),
        ];
    }
}
