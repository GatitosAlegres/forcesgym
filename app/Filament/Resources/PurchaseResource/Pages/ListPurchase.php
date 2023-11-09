<?php

namespace App\Filament\Resources\PurchaseResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\PurchaseResource;

class ListPurchase extends ListRecords
{
    protected static string $resource = PurchaseResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\ActionGroup::make([
                Actions\Action::make('Reporte de compras')
                    ->icon('heroicon-s-chart-bar')
                    ->url(PurchaseResource::getUrl('report'))
            ]),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return PurchaseResource::getWidgets();
    }
}
