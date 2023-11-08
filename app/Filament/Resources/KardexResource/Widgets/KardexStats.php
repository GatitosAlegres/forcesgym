<?php

namespace App\Filament\Resources\KardexResource\Widgets;

use App\Models\Kardex;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class KardexStats extends BaseWidget
{
    protected static ?int $sort = 0;

    protected function getCards(): array
    {
        return [
            Card::make('Kardex Registrados', Kardex::count()),
            Card::make('Kardex de Ingreso', Kardex::where('type_movement', 'Ingreso')->count()),
            Card::make('Kardex de Salida', Kardex::where('type_movement', 'Salida')->count()),
        ];
    }
}
