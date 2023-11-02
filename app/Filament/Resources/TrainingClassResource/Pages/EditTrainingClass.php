<?php

namespace App\Filament\Resources\TrainingClassResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\TrainingClassResource;

class EditTrainingClass extends EditRecord
{
    protected static string $resource = TrainingClassResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
