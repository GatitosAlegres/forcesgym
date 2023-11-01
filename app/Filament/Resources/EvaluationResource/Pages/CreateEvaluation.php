<?php

namespace App\Filament\Resources\EvaluationResource\Pages;

use App\Filament\Resources\EvaluationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Components\Card;
use Filament\Resources\Pages\CreateRecord\Concerns\HasWizard;

class CreateEvaluation extends CreateRecord
{
    protected static string $resource = EvaluationResource::class;

    use HasWizard;

    protected function getSteps(): array
    {
        return [
            Step::make('Evaluacion')
                ->schema([
                    Card::make(EvaluationResource::getFormSchema())->columns(),
                ]),

            Step::make('Evaluación Detalles')
                ->schema([
                    Card::make(EvaluationResource::getFormSchema('evaluationDetails')),
                ]),
        ];
    }

}
