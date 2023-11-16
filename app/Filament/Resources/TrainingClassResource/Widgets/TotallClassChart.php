<?php

namespace App\Filament\Resources\TrainingClassResource\Widgets;

use App\Models\Membership;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class TotallClassChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'totallClassChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Membresias adquiridas';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        //contamos el tipo_membresia_id de membresias, los tipos que sean 1,2,3
        $membresias = Membership::all();
        $membresias1 = $membresias->where('tipo_membresia_id', 1)->count();
        $membresias2 = $membresias->where('tipo_membresia_id', 2)->count();
        $membresias3 = $membresias->where('tipo_membresia_id', 3)->count();
        return [
            'chart' => [
                'type' => 'pie',
                'height' => 300,
            ],
            'series' => [$membresias1, $membresias2, $membresias3],
            'labels' => ['Mensual', 'Anual', 'Casual'],
            'legend' => [
                'labels' => [
                    'colors' => '#9ca3af',
                    'fontWeight' => 600,
                ],
            ],
        ];
    }
}
