<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Filament\Resources\ProductResource\Widgets\ProductStats;
use App\Filament\Widgets\ProductStats as WidgetsProductStats;
use App\Models\Product;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Category;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\Filter;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-lightning-bolt';

    protected static ?string $navigationGroup  = 'Inventario';

    protected static ?string $label = 'Productos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Card::make()
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(20)
                                    ->name('Nombre'),

                                Forms\Components\MarkdownEditor::make('description')
                                    ->required()
                                    ->maxLength(65535)
                                    ->name('Descripción')
                            ]),

                        Section::make('Precios ($/.)')
                            ->schema([
                                Forms\Components\TextInput::make('purchase_price')
                                    ->numeric()
                                    ->minValue(1)
                                    ->name('Precio de Compra')
                                    ->helperText('Costo de compra del producto')
                                    ->required(),

                                Forms\Components\TextInput::make('sale_price')
                                    ->numeric()
                                    ->minValue(1)
                                    ->name('Precio de Venta')
                                    ->helperText('Precio de venta al público, será visible.')
                                    ->required(),
                            ])->columns(2),
                    ])->columns(2),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Imagen')
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->acceptedFileTypes(['image/*'])
                                    ->name('Imagen')
                            ]),

                        Section::make('Asociaciones e Inventario')
                            ->schema([
                                Forms\Components\Select::make('category_id')
                                    ->options(
                                        \App\Models\Category::all()->pluck('name', 'id')
                                    )
                                    ->required()
                                    ->name('Categoria'),

                                Forms\Components\TextInput::make('stock')
                                    ->numeric()
                                    ->minValue(1)
                                    ->name('Stock')
                                    ->required(),

                                Forms\Components\TextInput::make('security_stock')
                                    ->numeric()
                                    ->minValue(1)
                                    ->name('Stock de Seguridad')
                                    ->helperText('Stock de aviso para reponer.')
                                    ->required(),
                            ])->columns(2),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label("Imagen"),
                Tables\Columns\TextColumn::make('name')->label("Nombre")->searchable()->sortable(),
                Tables\Columns\TextColumn::make('purchase_price')->label("Precio de Compra"),
                Tables\Columns\TextColumn::make('sale_price')->label("Precio de Venta"),
                Tables\Columns\TextColumn::make('stock')->label("Stock"),
                Tables\Columns\BadgeColumn::make('security_stock')->colors([
                    'danger',
                ])->label("Stock de Seguridad")->alignCenter(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category_id')
                    ->options(
                        \App\Models\Category::all()->pluck('name', 'id')
                    )
                    ->label('Categoria')
                    ->placeholder('Todos')
                    ->multiple()
                    ->searchable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getWidgets(): array
    {
        return [
            ProductStats::class,
        ];
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

    protected static function getNavigationBadge(): ?string
    {
        return static::$model::count();
    }
}
