<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SaleDetailResource\Pages;
use App\Filament\Resources\SaleDetailResource\RelationManagers;
use App\Models\SaleDetail;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SaleDetailResource extends Resource
{
    protected static ?string $model = SaleDetail::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup  = 'Ventas';

    protected static ?string $label = 'Venta Detalle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('sale_id')
                    ->required(),
                Forms\Components\TextInput::make('product_id')
                    ->required(),
                Forms\Components\TextInput::make('quantity')
                    ->required(),
                Forms\Components\TextInput::make('price_unitary')
                    ->required(),
                Forms\Components\TextInput::make('sub_amount')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sale_id'),
                Tables\Columns\TextColumn::make('product_id'),
                Tables\Columns\TextColumn::make('quantity'),
                Tables\Columns\TextColumn::make('price_unitary'),
                Tables\Columns\TextColumn::make('sub_amount'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSaleDetails::route('/'),
            'create' => Pages\CreateSaleDetail::route('/create'),
            'edit' => Pages\EditSaleDetail::route('/{record}/edit'),
        ];
    }
}
