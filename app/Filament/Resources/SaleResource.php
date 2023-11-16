<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SaleResource\Pages;
use App\Filament\Resources\SaleResource\RelationManagers;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Customer;
use App\Models\User;
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

//use App\Filament\Resources\SaleResource\Widgets\SalesAmount;

class SaleResource extends Resource
{

    protected static ?string $model = Sale::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationGroup  = 'Ventas';

    protected static ?string $label = 'Venta';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Select::make('code')
                ->options([
                    'Boleta' => 'Boleta',
                    'Factura' => 'Factura',
                ])
                ->required()
                ->name("Tipo de documento"),
                /*Forms\Components\Select::make('user_id')
    ->relationship('user', 'name')
    ->required()
    ->placeholder('Seleccionar un usuario')
    ->label('Usuario'),*/
                Forms\Components\TextInput::make('user_name')
                ->disabled()
                ->default(auth()->user()->name) // Nombre predeterminado del usuario autenticado
                ->label('Usuario'),




                Forms\Components\Select::make('cliente_id')
                    ->relationship('customers', 'nombre')
                    ->required()
                    ->placeholder('Seleccione una cliente')
                    ->label("Cliente")
                    ->createOptionForm([
                        Forms\Components\TextInput::make('nombre')
                            ->required()
                            ->maxLength(50)
                            ->label('Nombre/Razón Social'),
                        Forms\Components\TextInput::make('dni')
                            ->required()
                            ->maxLength(11)
                            ->label('DNI/RUC'),
                        Forms\Components\TextInput::make('email')
                            ->maxLength(30)
                            ->required(),
                        Forms\Components\TextInput::make('telefono')
                            ->maxLength(9)
                            ->required(),
                        Forms\Components\TextInput::make('direccion')
                            ->maxLength(50)
                            ->required(),
                    ]),


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
                Tables\Columns\TextColumn::make('code')->label('Tipo de Documento'),
                Tables\Columns\TextColumn::make('customers.nombre')
                    ->searchable()
                    ->label('Cliente'),

                Tables\Columns\TextColumn::make('date')
                    ->date()->label('Fecha y hora'),
                Tables\Columns\TextColumn::make('amount')->label('Monto'),
                Tables\Columns\TextColumn::make('user.name')
                ->label('Usuario')
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
                    Tables\Actions\DeleteAction::make(),
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

    protected static function getNavigationBadge(): ?string
    {
        return static::$model::count();
    }



    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSales::route('/'),
            'create' => Pages\CreateSale::route('/create'),
            'edit' => Pages\EditSale::route('/{record}/edit'),
        ];
    }

}
