<?php

namespace App\Filament\Resources\TrainingClassResource\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;
use App\Models\Membership;

class EntranceKPIChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'IngresosKPI';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Meta de ingresos / $. 100k';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        $sumaPreciosSoles = Membership::sum('precio');
        $valorCambio = 3.77;
        $sumaPreciosDolares = $sumaPreciosSoles / $valorCambio;

        // Definir la meta
        $meta = 100000; // 100k

        // Calcular el porcentaje alcanzado
        $porcentajeAlcanzado = number_format(($sumaPreciosDolares / $meta) * 100, 1);

        return [
            'chart' => [
                'type' => 'radialBar',
                'height' => 300,
            ],
            'series' => [$porcentajeAlcanzado],
            'plotOptions' => [
                'radialBar' => [
                    'hollow' => [
                        'size' => '70%',
                    ],
                    'dataLabels' => [
                        'show' => true,
                        'name' => [
                            'show' => true,
                            'color' => '#9ca3af',
                            'fontWeight' => 600,
                        ],
                        'value' => [
                            'show' => true,
                            'color' => '#9ca3af',
                            'fontWeight' => 600,
                            'fontSize' => '20px',
                        ],
                    ],
                ],
            ],
            'stroke' => [
                'lineCap' => 'round',
            ],
            'labels' => ['EntranceKPIChart'],
            'colors' => ['#f59e0b'],
        ];
    }
}
