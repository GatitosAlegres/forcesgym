<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Models\Category;
use App\Models\PurchaseDetail;

class PurchasesChart extends ApexChartWidget
{
    protected static string $chartId = 'purchasesChart';

    protected static ?string $heading = 'Compras por producto';

    protected static ?int $sort = 5;

    protected function getOptions(): array
    {

        $purchasesByProduct = PurchaseDetail::with('product')
            ->selectRaw('product_id, SUM(total) as total_purchases')
            ->groupBy('product_id')
            ->get();

        $productNames = $purchasesByProduct->pluck('product.name')->toArray();
        $totalpurchases = $purchasesByProduct->pluck('total_purchases')->toArray();

        return [
            'chart' => [
                'type' => 'bar',
                'height' => 700,
                'toolbar' => [
                    'show' => false,
                ],
            ],
            'series' => [
                [
                    'name' => 'Compras por Producto',
                    'data' => $totalpurchases,
                ],
            ],
            'xaxis' => [
                'categories' => $productNames,
            ],

            'yaxis' => [
                'labels' => [
                    'style' => [
                        'colors' => '#9ca3af',
                        'fontWeight' => 600,
                    ],
                ],
            ],
            'colors' => ['#6366f1'],
            'plotOptions' => [
                'bar' => [
                    'borderRadius' => 10,
                    'horizontal' => true,
                ],
            ],
            'grid' => [
                'show' => false,
            ],
            'dataLabels' => [
                'enabled' => false,
            ],
            'colors' => ['#facc15', '#38bdf8'],
            'fill' => [
                'type' => 'gradient',
                'gradient' => [
                    'shade' => 'dark',
                    'type' => 'horizontal',
                    'shadeIntensity' => 0.5,
                    'gradientToColors' => ['#f43f5e'],
                    'inverseColors' => false,
                    'opacityFrom' => 1,
                    'opacityTo' => 1,
                    'stops' => [0, 100],
                ],
            ],
            'annotations' => [
                'xaxis' => [
                    [
                        'x' => 25,
                        'x2' => 30,
                        'fillColor' => '#f43f5e',
                        'opacity' => 0.2,
                    ],
                ],
            ],
        ];
    }
}
