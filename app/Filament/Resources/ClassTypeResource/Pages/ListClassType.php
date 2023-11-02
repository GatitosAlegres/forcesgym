<?php

namespace App\Filament\Resources\ClassTypeResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\ClassTypeResource;

class ListClassType extends ListRecords
{
    protected static string $resource = ClassTypeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
