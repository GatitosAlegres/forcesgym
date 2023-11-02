<?php

namespace App\Filament\Resources\AssistanceResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

use App\Filament\Resources\AssistanceResource;

class ListAssistance extends ListRecords
{
    protected static string $resource = AssistanceResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
