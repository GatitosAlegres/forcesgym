<?php

namespace App\Filament\Resources\ClasesEntrenamientoResource\Pages;

use App\Filament\Resources\ClasesEntrenamientoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClasesEntrenamientos extends ListRecords
{
    protected static string $resource = ClasesEntrenamientoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
