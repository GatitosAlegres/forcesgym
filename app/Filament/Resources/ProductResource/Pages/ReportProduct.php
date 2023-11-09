<?php

namespace App\Filament\Resources\ProductResource\Pages;

use Filament\Resources\Pages\Page;
use App\Filament\Resources\ProductResource;
use App\Filament\Resources\ProductResource\Widgets\MostSelledProductsChart;
use App\Filament\Resources\ProductResource\Widgets\TotalStockOfProductsChart;

class ReportProduct extends Page
{
    protected static string $resource = ProductResource::class;

    protected static string $view = 'filament.resources.product-resource.pages.report-product';

    protected static ?string $title = 'Reporte de productos';

    protected function getHeaderWidgets(): array
    {
        return [
            TotalStockOfProductsChart::class,
            MostSelledProductsChart::class,
        ];
    }
}
