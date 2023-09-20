<?php

namespace App\Filament\Resources\TipoClasesResource\Pages;

use App\Filament\Resources\TipoClasesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTipoClases extends ListRecords
{
    protected static string $resource = TipoClasesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
