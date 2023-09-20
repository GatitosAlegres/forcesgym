<?php

namespace App\Filament\Resources\MembresiasResource\Pages;

use App\Filament\Resources\MembresiasResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMembresias extends EditRecord
{
    protected static string $resource = MembresiasResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
