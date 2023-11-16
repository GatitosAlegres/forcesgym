<?php

namespace App\Filament\Resources\PurchaseResource\Widgets;

use App\Models\Product;
use App\Models\Purchase;
use Filament\Widgets\Widget;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class PurchasesPerMonth extends ApexChartWidget
{
    protected static ?string $heading = 'Productos más comprados por mes';

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

        $purchasesInMonth = Purchase::whereMonth('issue_date', $activeFilter)->with('detalles')->get();

        foreach ($purchasesInMonth as $purchase) {
            foreach ($purchase->detalles as $detalles) {
                $product_id = $detalles->product->id;
                $quantity = $detalles->quantity;

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
                    'name' => 'Cantidad comprada',
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
