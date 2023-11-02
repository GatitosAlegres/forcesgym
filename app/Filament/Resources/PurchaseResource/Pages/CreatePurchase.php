<?php

namespace App\Filament\Resources\PurchaseResource\Pages;

use Filament\Pages\Actions;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Wizard\Step;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\PurchaseResource;
use Filament\Resources\Pages\CreateRecord\Concerns\HasWizard;

class CreatePurchase extends CreateRecord
{
    protected static string $resource = PurchaseResource::class;

    use HasWizard;

    protected function getSteps(): array
    {
        return [
            Step::make('Compra')
                ->schema([
                    Card::make(PurchaseResource::getFormSchema())->columns(),
                ]),

            Step::make('Compra Items')
                ->schema([
                    Card::make(PurchaseResource::getFormSchema('detalles')),
                ]),
        ];
    }
}
