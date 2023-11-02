<?php

namespace App\Filament\Resources\AssistanceDetailResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\AssistanceDetailResource;

class ListAssistanceDetail extends ListRecords
{
    protected static string $resource = AssistanceDetailResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
