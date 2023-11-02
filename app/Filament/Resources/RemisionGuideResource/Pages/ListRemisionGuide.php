<?php

namespace App\Filament\Resources\RemisionGuideResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\RemisionGuideResource;

class ListRemisionGuide extends ListRecords
{
    protected static string $resource = RemisionGuideResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
