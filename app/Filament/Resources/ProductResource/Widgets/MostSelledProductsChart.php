<?php

namespace App\Filament\Resources\ProductResource\Widgets;

use App\Models\Kardex;
use App\Models\Product;
use App\Models\Sale;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Illuminate\Support\Facades\DB;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class MostSelledProductsChart extends ApexChartWidget
{
    protected static ?string $heading = 'Productos más vendidos por mes';

    protected function getFilters(): ?array
    {
        $mounths = ['Ene', 'Feb', 'Mar', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'];
        return $mounths;
    }

    protected function getOptions(): array
    {
        $activeFilter = $this->filter + 1;

        $data = [];
        $categories = [];

        $salesInMonth = Sale::whereMonth('date', $activeFilter)->with('saleDetails')->get();

        foreach ($salesInMonth as $sale) {
            foreach ($sale->saleDetails as $saleDetail) {
                $product_id = $saleDetail->product_id;
                $quantity = $saleDetail->quantity;

                if (isset($data[$product_id])) {
                    $data[$product_id] += $quantity;
                } else {
                    $data[$product_id] = $quantity;
                }
            }
        }

        $productIds = array_keys($data);
        $products = Product::whereIn('id', $productIds)->get();

        foreach ($products as $product) {
            $categories[$product->id] = $product->name;
        }

        krsort($categories);

        return [
            'chart' => [
                'type' => 'bar',
                'height' => 350,
                'toolbar' => [
                    'show' => true,
                ]
            ],
            'series' => [
                [
                    'name' => 'Cantidad vendida',
                    'data' => array_values($data),
                ],
            ],
            'xaxis' => [
                'categories' => array_values($categories),
                'labels' => [
                    'style' => [
                        'fontWeight' => 400,
                        'fontFamily' => 'inherit'
                    ],
                ],
            ],
            'yaxis' => [
                'labels' => [
                    'style' => [
                        'fontWeight' => 400,
                        'fontFamily' => 'inherit'
                    ],
                ],
            ],
            'fill' => [
                'type' => 'gradient',
                'gradient' => [
                    'shade' => 'dark',
                    'type' => 'vertical',
                    'shadeIntensity' => 0.5,
                    'gradientToColors' => ['#fbbf24'],
                    'inverseColors' => true,
                    'opacityFrom' => 1,
                    'opacityTo' => 1,
                    'stops' => [0, 100],
                ],
            ],
            'plotOptions' => [
                'bar' => [
                    'borderRadius' => 10,
                    'horizontal' => false,
                ],
            ],
            'dataLabels' => [
                'enabled' => false,
            ],
            'grid' => [
                'show' => true,
            ],
            'tooltip' => [
                'enabled' => true,
            ],
            'colors' => ['#f59e0b'],
        ];
    }
}
