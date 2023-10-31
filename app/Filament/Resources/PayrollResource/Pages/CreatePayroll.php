<?php

namespace App\Filament\Resources\PayrollResource\Pages;

use App\Filament\Resources\PayrollResource;
use Filament\Pages\Actions;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Components\Card;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\HasWizard;

class CreatePayroll extends CreateRecord
{
    protected static string $resource = PayrollResource::class;

    use HasWizard;

    protected function getSteps(): array
    {
        return [
            Step::make('Planilla')
                ->schema([
                    Card::make(PayrollResource::getFormSchema())->columns(),
                ]),

            Step::make('Planilla detalles')
                ->schema([
                    Card::make(PayrollResource::getFormSchema('payrollDetails')),
                ]),
        ];
    }
}
