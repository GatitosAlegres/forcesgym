<?php

namespace App\Filament\Resources\RemisionGuideResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\RemisionGuideResource;

class EditRemisionGuide extends EditRecord
{
    protected static string $resource = RemisionGuideResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
