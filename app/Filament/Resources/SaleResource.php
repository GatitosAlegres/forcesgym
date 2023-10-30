<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SaleResource\Pages;
use App\Filament\Resources\SaleResource\RelationManagers;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Cliente;
//use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class SaleResource extends Resource
{

    protected static ?string $model = Sale::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationGroup  = 'Ventas';

    protected static ?string $label = 'Venta';

    public static function form(Form $form): Form
    {
        //$roleName = 'cliente';

        return $form
            ->schema([
                Forms\Components\Select::make('cliente_id')
                    ->options(
                        \App\Models\Cliente::all()->pluck('nombre','id')

                    )
                    ->required()
                    ->placeholder('Seleccione una cliente')
                    ->name('Cliente'),
                Forms\Components\DateTimePicker::make('date')
                    ->default(now())
                    ->label('Fecha y hora')
                    ->required(),

                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Placeholder::make('Productos'),

                        Repeater::make('saleDetails')
                            ->relationship()
                            ->schema(
                                [
                                    Forms\Components\Select::make('product_id')
                                        ->label('Producto')
                                        ->options(Product::query()->pluck('name', 'id'))
                                        ->required()
                                        ->afterStateUpdated(
                                            function ($state, callable $set) {
                                                $product = Product::find($state);
                                                if ($product) {
                                                    $set('price_unitary', $product->sale_price);
                                                }
                                            }
                                        )
                                        ->reactive(),
                                    Forms\Components\TextInput::make('quantity')
                                        ->numeric()
                                        ->default(0)
                                        ->required()
                                        ->label('Cantidad'),
                                    TextInput::make('price_unitary')
                                        ->numeric()
                                        ->disabled()
                                        ->default(0)
                                        ->label('Precio unitario'),
                                ]
                            )
                            ->defaultItems(1)
                            ->columns(3)
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('clientes.nombre')
                    ->label('Cliente'),
                Tables\Columns\TextColumn::make('date')
                    ->date()->label('Fecha y hora'),
                Tables\Columns\TextColumn::make('amount')->label('Monto')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('Download Pdf')
                    ->icon('heroicon-o-document-download')
                    ->url(fn (Sale $record) => route('sale.pdf.download', $record))
                    ->openUrlInNewTab(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                ExportBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSales::route('/'),
            'create' => Pages\CreateSale::route('/create'),
            'edit' => Pages\EditSale::route('/{record}/edit'),
        ];
    }

    protected static function getNavigationBadge(): ?string
    {
        return static::$model::count();
    }
}
