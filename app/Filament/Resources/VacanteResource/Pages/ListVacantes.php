<?php

namespace App\Filament\Resources\VacanteResource\Pages;

use App\Filament\Resources\VacanteResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVacantes extends ListRecords
{
    protected static string $resource = VacanteResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
