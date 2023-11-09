<?php

namespace App\Filament\Resources\MembershipResource\Widgets;

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

        $count1 = Membership::where('tipo_membresia_id', 2)->count();
        $count2 = Membership::where('tipo_membresia_id', 3)->count();
        $count3 = Membership::where('tipo_membresia_id', 1)->count();
        $sumaPreciosSoles = Membership::sum('precio');
        $valorCambio = 3.77;
        $sumaPreciosDolares = $sumaPreciosSoles / $valorCambio;

        return [
            Card::make('Membership Anuales', $count1)
                ->chart(
                    $orderData
                        ->map(fn (TrendValue $value) => $value->aggregate)
                        ->toArray()
                )
                ->description('Compromiso a largo plazo')
                ->descriptionIcon('heroicon-s-trending-up')
                ->color('success'),
            Card::make('Membership Casuales', $count2)
                ->chart(
                    $orderData
                        ->map(fn (TrendValue $value) => $value->aggregate)
                        ->toArray()
                )
                ->description('Flexibilidad mensual')
                ->descriptionIcon('heroicon-s-trending-up')
                ->color('warning'),
            Card::make('Membership Mensuales', $count3)
                ->chart(
                    $orderData
                        ->map(fn (TrendValue $value) => $value->aggregate)
                        ->toArray()
                )
                ->description('Entrenamiento ocasional')
                ->descriptionIcon('heroicon-s-trending-up')
                ->color('success'),
            Card::make('Ganancias generadas:', 'S/ PEN ' . number_format(Membership::sum('precio')))
                ->description('Total de ganancias USD $' . number_format($sumaPreciosDolares))
                ->color('success'),

        ];
    }
}
