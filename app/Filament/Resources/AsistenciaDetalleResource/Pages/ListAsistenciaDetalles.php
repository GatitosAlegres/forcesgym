<?php

namespace App\Filament\Resources\AsistenciaDetalleResource\Pages;

use App\Filament\Resources\AsistenciaDetalleResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAsistenciaDetalles extends ListRecords
{
    protected static string $resource = AsistenciaDetalleResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
