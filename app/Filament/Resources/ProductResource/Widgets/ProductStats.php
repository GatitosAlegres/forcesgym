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
            Card::make('Productos', Product::count())
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
                Card::make('Stock de todos los productos', Product::sum('stock'))
                ->chart([17, 16, 14, 15, 14, 13, 12])
                ->color('primary'),
            Card::make('Dinero invertido', '$/. ' . number_format(Product::sum('purchase_price'), 2))
                ->chart([15, 4, 10, 2, 12, 4, 12])
                ->color('danger'),
        ];
    }
}
