<?php

namespace App\Filament\Resources\KardexResource\Pages;

use App\Filament\Resources\KardexResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKardex extends EditRecord
{
    protected static string $resource = KardexResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
