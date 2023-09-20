<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OfferResource\Pages;
use App\Filament\Resources\OfferResource\RelationManagers;
use App\Models\Offer;
use App\Models\Product;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OfferResource extends Resource
{
    protected static ?string $model = Offer::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup  = 'Gestión de inventario';

    protected static ?string $label = 'Oferta';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('product_id')
                    ->label('Producto')
                    ->options(Product::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('offer_type')
                    ->required()
                    ->maxLength(20)
                    ->label('Oferta'),
                Forms\Components\Textarea::make('offer_details')
                    ->required()
                    ->maxLength(65535)
                    ->label('Descripción'),
                Forms\Components\DatePicker::make('start_date')
                    ->label('Tiempo de inicio')
                    ->required(),
                Forms\Components\DatePicker::make('end_date')
                    ->label('Tiempo de finalización')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product.name')
                    ->label('Producto'),
                Tables\Columns\TextColumn::make('offer_type')
                    ->label('Oferta'),
                Tables\Columns\TextColumn::make('offer_details')
                    ->label('Descripción'),
                Tables\Columns\TextColumn::make('start_date')
                    ->label('Tiempo de inicio')
                    ->date(),
                Tables\Columns\TextColumn::make('end_date')
                    ->label('Tiempo de finalización')
                    ->date(),
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
            'index' => Pages\ListOffers::route('/'),
            'create' => Pages\CreateOffer::route('/create'),
            'edit' => Pages\EditOffer::route('/{record}/edit'),
        ];
    }
}
