<?php

namespace App\Filament\Resources\ProductRecordSheetResource\Widgets;

use App\Models\Kardex;
use App\Models\ProductRecordSheet;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class ProductRecordSheetStats extends BaseWidget
{
    protected static ?int $sort = 0;

    protected function getCards(): array
    {
        return [
            Card::make('Hojas de Registro de Movimiento', ProductRecordSheet::count()),

            Card::make('Total de Kardex Asociados', Kardex::count()),

            Card::make('Periodo', date('Y')),
        ];
    }
}
