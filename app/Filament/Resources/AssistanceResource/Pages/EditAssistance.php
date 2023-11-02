<?php

namespace App\Filament\Resources\AssistanceResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\AssistanceResource;

class EditAssistance extends EditRecord
{
    protected static string $resource = AssistanceResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
