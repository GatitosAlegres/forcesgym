<?php

namespace App\Filament\Resources\PurchaseResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class PurchaseDetailRelationManager extends RelationManager
{
    protected static string $relationship = 'detalles';

    protected static ?string $recordTitleAttribute = 'product_id';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Select::make('compra_id')
                    ->relationship('compra', 'id')
                    ->required()
                    ->label('Compra'),

                Forms\Components\Select::make('product_id')
                    ->required()
                    ->options(\App\Models\Product::all()->pluck('name', 'id'))
                    ->name('Producto'),

                Forms\Components\Select::make('supplier_id')
                    ->required()
                    ->options(\App\Models\Supplier::all()->pluck('name', 'id'))
                    ->name('Proveedor'),

                Forms\Components\TextInput::make('quantity')
                    ->type('number')
                    ->required()
                    ->label('Cantidad'),

                Forms\Components\TextInput::make('unit_price')
                    ->type('number')
                    ->required()
                    ->label('Precio unitario'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product.name')->label('Producto'),
                Tables\Columns\TextColumn::make('quantity')->label('Cantidad'),
                Tables\Columns\TextColumn::make('unit_price')->label('Precio unitario (S/)'),
                Tables\Columns\TextColumn::make('total')->label('Total (S/)'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                ExportBulkAction::make(),
            ]);
    }
}
