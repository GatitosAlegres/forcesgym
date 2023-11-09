<?php

namespace App\Filament\Resources\AssistanceResource\Pages;

use Filament\Pages\Actions;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Wizard\Step;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\AssistanceResource;
use Filament\Resources\Pages\CreateRecord\Concerns\HasWizard;

class CreateAssistance extends CreateRecord
{
    protected static string $resource = AssistanceResource::class;

    use HasWizard;

    protected function getSteps(): array
    {
        return [
            Step::make('Asistencia')
                ->schema([
                    Card::make(AssistanceResource::getFormSchema())->columns(),
                ]),

            Step::make('Asistencia Detalles')
                ->schema([
                    Card::make(AssistanceResource::getFormSchema('detalles')),
                ]),
        ];
    }
}
