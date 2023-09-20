<?php

namespace App\Filament\Resources\CompraResource\Pages;

use Filament\Pages\Actions;
use Filament\Forms\Components\Card;
use App\Filament\Resources\CompraResource;
use Filament\Forms\Components\Wizard\Step;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\HasWizard;

class CreateCompra extends CreateRecord
{
    protected static string $resource = CompraResource::class;

    use HasWizard;

    protected function getSteps(): array
    {
        return [
            Step::make('Compra')
                ->schema([
                    Card::make(CompraResource::getFormSchema())->columns(),
                ]),

            Step::make('Compra Items')
                ->schema([
                    Card::make(CompraResource::getFormSchema('detalles')),
                ]),
        ];
    }
}
