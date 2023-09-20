<?php

namespace App\Filament\Resources\OfertaLaboralResource\Pages;

use App\Filament\Resources\OfertaLaboralResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOfertaLaborals extends ListRecords
{
    protected static string $resource = OfertaLaboralResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
