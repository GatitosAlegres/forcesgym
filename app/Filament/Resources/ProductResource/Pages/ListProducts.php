<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),

            Actions\ActionGroup::make([
                Actions\Action::make('Gráficos dinámicos')
                    ->icon('heroicon-s-chart-bar')
                    ->url(ProductResource::getUrl('report')),

                Actions\Action::make('Generar Pdf')
                    ->icon('heroicon-s-document-download')
                    ->url(route('products.pdf.download'))
                    ->openUrlInNewTab(),
            ]),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return ProductResource::getWidgets();
    }
}
