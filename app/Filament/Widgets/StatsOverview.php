<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Product;
use App\Models\Socio;
use App\Models\Promotion;
use App\Models\User;
use App\Models\TipoClases;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make(
                'Productos',
                Product::count()
            )
                ->description('Productos registrados en la base de datos')
                ->descriptionIcon('heroicon-o-shopping-cart')
                ->color('success')
                ->chart(
                    Product::pluck('stock')->toArray(),
                ),

            Card::make(
                'Socios',
                Socio::count()
            )
                ->description('Clientes registrados en la base de datos')
                ->descriptionIcon('heroicon-o-user-group')
                ->color('success'),



            Card::make(
                'Categorias',
                Category::count()
            )
                ->description('Categorias registradas en la base de datos')
                ->descriptionIcon('heroicon-o-collection')
                ->color('success'),
            Card::make(
                'Usuarios',
                User::count()
            )
                ->description('Usuarios registrados en la base de datos')
                ->descriptionIcon('heroicon-o-user-group')
                ->color('success'),
            Card::make(
                'Promociones',
                Promotion::count()
            )
                ->description('Promociones registradas en la base de datos')
                ->descriptionIcon('heroicon-o-tag')
                ->color('success')
                ->chart(
                    Promotion::pluck('precio')->toArray(),
                ),
            Card::make(
                'Clases de entrenamiento',
                TipoClases::count()
            )
                ->description('¡Superación y bienestar en cada clase!')
                ->descriptionIcon('heroicon-o-tag')
                ->color('success')
                ->chart(
                    TipoClases::pluck('id')->toArray(),
                ),
        ];
    }
}
