<?php

namespace App\Filament\Resources\WarrantyResource\Pages;

use App\Filament\Resources\WarrantyResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWarranty extends EditRecord
{
    protected static string $resource = WarrantyResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
