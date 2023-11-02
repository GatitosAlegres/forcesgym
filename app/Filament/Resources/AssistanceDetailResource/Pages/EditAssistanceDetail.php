<?php

namespace App\Filament\Resources\AssistanceDetailResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\AssistanceDetailResource;

class EditAssistanceDetail extends EditRecord
{
    protected static string $resource = AssistanceDetailResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
