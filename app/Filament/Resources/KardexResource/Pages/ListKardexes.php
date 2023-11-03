<?php

namespace App\Filament\Resources\KardexResource\Pages;

use App\Filament\Resources\KardexResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKardexes extends ListRecords
{
    protected static string $resource = KardexResource::class;
    
    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return KardexResource::getWidgets();
    }
}
