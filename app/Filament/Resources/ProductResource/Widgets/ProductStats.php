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
                //->chart([7, 2, 10, 3, 15, 4, 17])
                ->description('Registros en la base de datos')
                ->descriptionIcon('heroicon-s-database')
                ->color('secondary'),
            Card::make('Stock de todos los productos', Product::sum('stock'))
                //->chart([17, 16, 14, 15, 14, 13, 12])
                ->description('Gran stock total')
                ->descriptionIcon('heroicon-s-trending-up')
                ->color('primary'),
            Card::make('Ganancia esperada', number_format(Product::sum('sale_price') - Product::sum('purchase_price'), 2, ',', '.'))
                //->chart([15, 4, 10, 2, 12, 4, 12])
                ->description('Estamos en ganancia gentita')
                ->descriptionIcon('heroicon-s-badge-check')
                ->color('success'),
        ];
    }
}
