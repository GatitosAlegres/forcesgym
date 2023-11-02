<?php

namespace App\Filament\Resources\ProductRecordSheetResource\Pages;

use App\Filament\Resources\ProductRecordSheetResource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Wizard\Step;
use Filament\Notifications\Notification;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\HasWizard;
use Filament\Notifications\Actions\Action;

class CreateProductRecordSheet extends CreateRecord
{
    use HasWizard;

    protected static string $resource = ProductRecordSheetResource::class;

    protected function afterCreate(): void
    {
        $productRecordSheet = $this->record;

        Notification::make()
            ->title('Nueva Hoja de Registro de Movimientos')
            ->icon('heroicon-s-clipboard-list')
            ->body("Se ha creado la hoja de registro de movimientos para el producto **{$productRecordSheet->product->name}** con éxito.
                    \n\nFecha: **{$productRecordSheet->created_at->format('d/m/Y')}**")
            ->actions([
                Action::make('Ver')
                    ->url(ProductRecordSheetResource::getUrl('edit', ['record' => $productRecordSheet->id]))
            ])
            ->sendToDatabase(auth()->user());
    }

    protected function getSteps(): array
    {
        return [
            Step::make('Hoja de Registro de Movimientos de Producto')->schema([
                Card::make(ProductRecordSheetResource::getFormSchema())->columns(),
            ]),

            Step::make('Kardex Items')->schema([
                Card::make(ProductRecordSheetResource::getFormSchema('kardex')),
            ]),
        ];
    }
}
