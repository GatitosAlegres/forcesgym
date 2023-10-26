<?php

namespace App\Filament\Resources\GuiaRemisionResource\Pages;

use App\Filament\Resources\GuiaRemisionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGuiaRemision extends EditRecord
{
    protected static string $resource = GuiaRemisionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
