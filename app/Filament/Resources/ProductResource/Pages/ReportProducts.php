<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Filament\Resources\ProductResource\Widgets\MostSelledProductsChart;
use App\Filament\Resources\ProductResource\Widgets\TotalStockOfProductsChart;
use Filament\Resources\Pages\Page;
use Illuminate\Contracts\View\View;

class ReportProducts extends Page
{
    protected static string $resource = ProductResource::class;

    protected static string $view = 'filament.resources.product-resource.pages.report-products';

    protected static ?string $title = 'Reporte de productos';

    protected function getHeaderWidgets(): array
    {
        return [
            TotalStockOfProductsChart::class,
            MostSelledProductsChart::class,
        ];
    }
}
