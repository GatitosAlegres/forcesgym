<?php

namespace App\Filament\Resources\GuiaRemisionResource\Pages;

use App\Filament\Resources\GuiaRemisionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGuiaRemisions extends ListRecords
{
    protected static string $resource = GuiaRemisionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
