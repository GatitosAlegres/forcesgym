<?php

namespace App\Filament\Resources\ClassTypeResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\ClassTypeResource;

class EditClassType extends EditRecord
{
    protected static string $resource = ClassTypeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
