<?php

namespace App\Filament\Widgets;

use App\Models\Purchase;
use App\Models\Partner;
use App\Models\User;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class ConversionRateKPIChart extends ApexChartWidget
{
    protected static string $chartId = 'conversionRateKPIChart';

    protected static ?string $heading = 'KPI Tasa de Conversión';

    protected static ?int $sort = 6;

    protected function getOptions(): array
    {
        $shoppingCount = Purchase::count();
        $clients = Partner::count();
        if ($clients == 0) {
            $conversionRate = 0;
        } else {
            $conversionRate = ($shoppingCount / $clients) * 100;
        }

        return [
            'chart' => [
                'type' => 'radialBar',
                'height' => 330,
                'toolbar' => [
                    'show' => false,
                ],
            ],
            'series' => [$conversionRate],
            'plotOptions' => [
                'radialBar' => [
                    'startAngle' => -135,
                    'endAngle' => 225,
                    'hollow' => [
                        'margin' => 0,
                        'size' => '60%',
                        'background' => 'transparent',
                        'position' => 'front',
                        'dropShadow' => [
                            'enabled' => true,
                            'top' => 3,
                            'left' => 0,
                            'blur' => 4,
                            'opacity' => 0.24,
                        ],
                    ],
                    'track' => [
                        'background' => '#fff',
                        'strokeWidth' => '67%',
                        'margin' => 0,
                        'dropShadow' => [
                            'enabled' => true,
                            'top' => -3,
                            'left' => 0,
                            'blur' => 4,
                            'opacity' => 0.35,
                        ],
                    ],
                    'dataLabels' => [
                        'show' => true,
                        'name' => [
                            'show' => true,
                            'offsetY' => -10,
                            'color' => '#9ca3af',
                            'fontWeight' => 600,
                        ],
                        'value' => [
                            'show' => true,
                            'color' => '#9ca3af',
                            'fontWeight' => 600,
                        ],
                    ],

                ],
            ],
            'fill' => [
                'type' => 'gradient',
                'gradient' => [
                    'shade' => 'dark',
                    'type' => 'horizontal',
                    'shadeIntensity' => 0.7,
                    'gradientToColors' => ['#6366f1'],
                    'inverseColors' => true,
                    'opacityFrom' => 1,
                    'opacityTo' => 1,
                    'stops' => [0, 100],
                ],
            ],
            'stroke' => [
                'lineCap' => 'round',
            ],
            'labels' => ['Percent'],
            'colors' => ['#f43f5e'],

        ];
    }
}
