<?php

namespace App\Filament\Resources\ProductResource\Widgets;

use App\Models\Category;
use App\Models\Product;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class TotalStockOfProductsChart extends ApexChartWidget
{
    protected static string $name = 'total-stock-of-products-chart';
    
    protected static ?string $heading = 'Stock de Productos por Categoría';

    protected static ?string $pollingInterval = null;

    protected static bool $darkMode = true;

    protected function getFilters(): ?array
    {
        $categories = Category::all()->pluck('name')->toArray();
        return $categories;
    }

    protected function getOptions(): array
    {
        $activeFilter = $this->filter + 1;
        $products = Product::where('category_id', $activeFilter)->get();
        $seriesData = $products->pluck('stock')->toArray();
        $stockMax = max($seriesData);
        $labels = $products->pluck('name')->toArray();

        return [
            'chart' => [
                'type' => 'bar',
                'height' => 300,
                'toolbar' => [
                    'show' => true,
                ],
            ],
            'series' => [
                [
                    'name' => 'Stock',
                    'data' => $seriesData,
                ],
            ],
            'xaxis' => [
                'categories' => $labels,
                'min' => 0,
                'max' => $stockMax,
                'labels' => [
                    'show' => true,
                    'fontWeight' => 400,
                    'fontFamily' => 'inherit'
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
            'colors' => ['#f59e0b'],
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
                    'gradientToColors' => ['#fbbf24'],
                    'inverseColors' => true,
                    'opacityFrom' => 1,
                    'opacityTo' => 1,
                    'stops' => [0, 100],
                ],
            ],
        ];
    }
}
