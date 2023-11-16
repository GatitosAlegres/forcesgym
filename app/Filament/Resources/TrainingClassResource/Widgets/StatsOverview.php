<?php

namespace App\Filament\Resources\TrainingClassResource\Widgets;

use App\Models\ClassType;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\Membership;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $orderData = Trend::model(Membership::class)
            ->between(
                start: now()->subYear(),
                end: now(),
            )
            ->perMonth()
            ->count();

        //contar el numero de clases de entrenamiento registradas
        $membresias = count(Membership::all());
        $sumaPreciosSoles = Membership::sum('precio');
        $valorCambio = 3.77;
        $sumaPreciosDolares = $sumaPreciosSoles / $valorCambio;
        //contar el tipo de clases de entrenamiento
        $NumeroCLases = count(ClassType::all());

        return [
            Card::make('Membresias adquiridas', $membresias)
                ->chart(
                    $orderData
                        ->map(fn (TrendValue $value) => $value->aggregate)
                        ->toArray()
                )
                ->description('Compromiso a largo plazo')
                ->descriptionIcon('heroicon-s-trending-up')
                ->color('success'),
                Card::make('Tipo de clases', $NumeroCLases)
                ->chart(
                    $orderData
                        ->map(fn (TrendValue $value) => $value->aggregate)
                        ->toArray()
                )
                ->description('Ejercicios de alta intensidad')
                ->descriptionIcon('heroicon-s-trending-up')
                ->color('danger'),
            Card::make('Ganancias generadas:', 'S/ PEN ' . number_format(Membership::sum('precio')))
                ->description('Total de ganancias USD $' . number_format($sumaPreciosDolares))
                ->color('success'),

        ];
    }
}
