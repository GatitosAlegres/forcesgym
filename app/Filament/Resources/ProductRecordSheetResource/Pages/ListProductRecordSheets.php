<?php

namespace App\Filament\Resources\ProductRecordSheetResource\Pages;

use App\Filament\Resources\ProductRecordSheetResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProductRecordSheets extends ListRecords
{
    protected static string $resource = ProductRecordSheetResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return ProductRecordSheetResource::getWidgets();
    }
}
