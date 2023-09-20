<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Category;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup  = 'Gestión de inventario';

    protected static ?string $label = 'Productos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('category_id')
                    ->options(
                        \App\Models\Category::all()->pluck('name', 'id')
                    )
                    ->required()
                    ->name('Categoria'),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->name('Nombre'),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->maxLength(65535)
                    ->name('Descripción'),
                Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->name('Precio')
                    ->required(),
                Forms\Components\TextInput::make('stock')
                    ->numeric()
                    ->name('Stock')
                    ->required(),
                Forms\Components\FileUpload::make('image')
                    ->required()
                    ->acceptedFileTypes(['image/*'])
                    ->name('Imagen')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label("Nombre"),
                Tables\Columns\TextColumn::make('description')->label("Descripción"),
                Tables\Columns\TextColumn::make('price')->label("Precio"),
                Tables\Columns\TextColumn::make('stock'),
                Tables\Columns\TextColumn::make('category.name')->label("Categoría"),
                //Tables\Columns\TextColumn::make('image'),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
