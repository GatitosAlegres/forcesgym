<?php

namespace App\Filament\Resources\TrainingClassResource\Pages;

use App\Filament\Resources\TrainingClassResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTrainingClass extends ListRecords
{
    protected static string $resource = TrainingClassResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
