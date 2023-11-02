<?php

namespace App\Filament\Resources\ProductRecordSheetResource\Pages;

use App\Filament\Resources\ProductRecordSheetResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductRecordSheet extends EditRecord
{
    protected static string $resource = ProductRecordSheetResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\RestoreAction::make(),
            Actions\ForceDeleteAction::make(),
        ];
    }
}
