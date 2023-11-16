<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;
use App\Models\Sale;
use App\Models\Product;
class MonthSalesChart extends ApexChartWidget
{

   protected static string $chartId = 'monthSalesChart';


    protected static ?string $heading = 'Productos vendidos por mes';

    protected static ?int $sort = 4;
    protected function getFilters(): ?array
    {
        $mounths = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'];
        return $mounths;
    }

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
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
                'type' => 'line',
                'height' => 300,
                'toolbar' => [
                    'show' => false,
                ],
            ],
            'series' => [
                [
                    'name' => 'Cantidad vendida',
                    'data' => array_values($data),
                    'type' => 'column',
                ],
                [
                    'name' => 'Trayectoria',
                    'data' => array_values($data),
                    'type' => 'line',
                ],
            ],
            'stroke' => [
                'width' => [0, 4],
                'curve' => 'smooth',
            ],
            'xaxis' => [
                'categories' => array_values($categories),
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
            /*'legend' => [
                'labels' => [
                    'colors' => '#9ca3af',
                    'fontWeight' => 600,
                ],
            ],*/
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
