<?php

namespace App\Filament\Resources\AsistenciaDetalleResource\Pages;

use App\Filament\Resources\AsistenciaDetalleResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAsistenciaDetalle extends EditRecord
{
    protected static string $resource = AsistenciaDetalleResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
