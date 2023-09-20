<?php

namespace App\Filament\Resources\SocioResource\Pages;

use App\Filament\Resources\SocioResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSocios extends ListRecords
{
    protected static string $resource = SocioResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
