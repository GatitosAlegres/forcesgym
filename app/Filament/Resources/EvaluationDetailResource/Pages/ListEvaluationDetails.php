<?php

namespace App\Filament\Resources\EvaluationDetailResource\Pages;

use App\Filament\Resources\EvaluationDetailResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEvaluationDetails extends ListRecords
{
    protected static string $resource = EvaluationDetailResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
