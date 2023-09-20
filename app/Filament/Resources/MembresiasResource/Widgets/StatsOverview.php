<?php

namespace App\Filament\Resources\MembresiasResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\Membresias;


class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $count1 = Membresias::where('tipo_membresia_id', 2)->count();
        $count2 = Membresias::where('tipo_membresia_id', 3)->count();
        $count3 = Membresias::where('tipo_membresia_id', 1)->count();

        return [
            Card::make('Membresias Anuales', $count1)
            ->description('32k increase')
            ->descriptionIcon('heroicon-s-trending-up'),
            Card::make('Membresias Casuales', $count2),
            Card::make('Membresias Mensuales', $count3),
        ];
    }
}
