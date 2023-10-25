<?php

namespace App\Filament\Resources\EvaluationDetailResource\Pages;

use App\Filament\Resources\EvaluationDetailResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEvaluationDetail extends EditRecord
{
    protected static string $resource = EvaluationDetailResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
