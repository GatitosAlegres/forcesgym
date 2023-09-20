<?php

namespace App\Filament\Resources\SaleDetailResource\Pages;

use App\Filament\Resources\SaleDetailResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSaleDetail extends EditRecord
{
    protected static string $resource = SaleDetailResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
