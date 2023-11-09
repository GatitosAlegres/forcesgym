<?php

namespace App\Filament\Resources\PurchaseResource\Pages;

use Filament\Resources\Pages\Page;
use App\Filament\Resources\PurchaseResource;
use App\Filament\Resources\PurchaseResource\Widgets\PurchasesPerMonth;
use App\Filament\Resources\PurchaseResource\Widgets\PurchasesStatusLastMonthChart;

class ReportPurchase extends Page
{
    protected static string $resource = PurchaseResource::class;

    protected static string $view = 'filament.resources.purchase-resource.pages.report-purchase';

    protected static ?string $title = 'Reporte de compras';

    protected function getHeaderWidgets(): array
    {
        return [
            PurchasesPerMonth::class,
            PurchasesStatusLastMonthChart::class
        ];
    }
}
