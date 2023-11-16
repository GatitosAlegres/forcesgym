<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Models\Category;

class SalesChart extends ApexChartWidget
{
    protected static string $chartId = 'salesChart';

    protected static ?string $heading = 'Ventas por producto';

    protected static ?int $sort = 4;

   /* protected function getFilters(): ?array
    {
        $categories = Category::all()->pluck('name')->toArray();
        return $categories;
    }*/


    protected function getOptions(): array
    {
      // Paso 1: Obtener los datos de ventas por producto (esto debe personalizarse según tu lógica)
    $salesByProduct = SaleDetail::with('product')
    ->selectRaw('product_id, SUM(sub_amount) as total_sales')
    ->groupBy('product_id')
    ->get();

// Paso 2: Preparar los datos para el gráfico
$productNames = $salesByProduct->pluck('product.name')->toArray();
$totalSales = $salesByProduct->pluck('total_sales')->toArray();

// Paso 3: Configurar las opciones del gráfico
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
            'name' => 'Ventas por Producto',
            'data' => $totalSales,
        ],
    ],
    'xaxis' => [
        'categories' => $productNames,
    ],
    // Resto de las opciones...


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

