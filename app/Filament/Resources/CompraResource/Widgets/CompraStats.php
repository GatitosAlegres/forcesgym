<?php

namespace App\Filament\Resources\CompraResource\Widgets;

use App\Models\Compra;

use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class CompraStats extends BaseWidget
{
    protected function getCards(): array
    {
        $orderData = Trend::model(Compra::class)
            ->between(
                start: now()->subYear(),
                end: now(),
            )
            ->perMonth()
            ->count();

        return [
            Card::make('Compras totales', Compra::count())
                ->chart(
                    $orderData
                        ->map(fn (TrendValue $value) => $value->aggregate)
                        ->toArray()
                )
                ->description('Compras pendientes + enviadas, entregadas y canceladas')
                ->color('success'),
            Card::make('Compras pendientes', Compra::whereIn('status', ['nuevo', 'procesando'])->count())
                ->description('Incluye las compras en estado nuevo y procesando')
                ->color('warning'),
            Card::make('Inversion promedio', '$USD '.number_format(Compra::where("currency", "USD")->avg('total_price'), 2))
                ->description('Total de inversion: $ ' . number_format(Compra::where("currency", "USD")->sum('total_price'), 2))
                ->color('success'),
            Card::make('Inversion promedio', 'S/ PEN '.number_format(Compra::where("currency", "PEN")->avg('total_price'), 2))
                ->description('Total de inversion: S/ ' . number_format(Compra::where("currency", "PEN")->sum('total_price'), 2))
                ->color('success'),
        ];
    }
}
