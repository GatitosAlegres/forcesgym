<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;
use App\Models\Product;
use App\Models\SaleDetail;

class SalesChart extends ApexChartWidget
{
    protected static string $chartId = 'salesChart';

    protected static ?string $heading = 'Ventas';

    protected static ?int $sort = 4;

    protected function getFilters(): ?array
     {
         $months = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Setiembre","Octubre","Noviembre","Dieciembre"];

         return $months;
     }

    protected function getOptions(): array
    {
        $products = Product::all();
        $nameProducts = $products->pluck('name')->toArray();
        $saleDetails = SaleDetail::all();
        
        return [
            'chart' => [
                'type' => 'line',
                'height' => 300,
                'toolbar' => [
                    'show' => false,
                ],
            ],
            'series' => [
                [
                    'name' => 'Column',
                    'data' => [20, 25, 30, 32, 26, 24, 20, 18, 22, 24, 30, 20],
                    'type' => 'column',
                ],
                [
                    'name' => 'Line',
                    'data' => [18, 25, 30, 29, 24, 22, 18, 20, 24, 20, 28, 20],
                    'type' => 'line',
                ],
            ],
            'stroke' => [
                'width' => [0, 4],
                'curve' => 'smooth',
            ],
            'xaxis' => [
                'categories' => $nameProducts,
                'labels' => [
                    'style' => [
                        'colors' => '#9ca3af',
                        'fontWeight' => 600,
                    ],
                ],
            ],
            'yaxis' => [
                'labels' => [
                    'style' => [
                        'colors' => '#9ca3af',
                        'fontWeight' => 600,
                    ],
                ],
            ],
            'legend' => [
                'labels' => [
                    'colors' => '#9ca3af',
                    'fontWeight' => 600,
                ],
            ],
            'colors' => ['#6366f1', '#38bdf8'],
            'fill' => [
                'type' => 'gradient',
                'gradient' => [
                    'shade' => 'dark',
                    'type' => 'vertical',
                    'shadeIntensity' => 0.5,
                    'gradientToColors' => ['#d946ef'],
                    'inverseColors' => true,
                    'opacityFrom' => 1,
                    'opacityTo' => 1,
                    'stops' => [0, 100],
                ],
            ],
            'plotOptions' => [
                'bar' => [
                    'borderRadius' => 10,
                ],
            ],
        ];
    }
}
