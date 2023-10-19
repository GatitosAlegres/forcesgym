<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Product;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class ProductsStockChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'productsStockChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Stock de Productos';

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
        $labels = $products->pluck('name')->toArray();

        $options = [
            'chart' => [
                'type' => 'pie',
                'height' => 300,
            ],
            'series' => $seriesData,
            'labels' => $labels,
            'legend' => [
                'labels' => [
                    'colors' => '#9ca3af',
                    'fontWeight' => 600,
                ],
            ],
        ];

        return $options;
    }
}