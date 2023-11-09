<?php

namespace App\Filament\Resources\PurchaseResource\Widgets;

use App\Models\Purchase;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class PurchasesStatusLastMonthChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'purchasesStatusLastMonthChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Estado de las compras del ultimo mes';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        $purchasesDelivered = Purchase::where('status', 'entregado')->whereBetween('created_at', [now()->subMonth(), now()])->count() / Purchase::whereBetween('created_at', [now()->subMonth(), now()])->count() * 100;

        return [
            'chart' => [
                'type' => 'radialBar',
                'height' => 300,
            ],
            'series' => [number_format($purchasesDelivered, 2, '.', '')],
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
            'labels' => ['Entregadas'],
            'colors' => ['#1ccb5b'],
        ];
    }

    protected static ?string $footer = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.';
}
