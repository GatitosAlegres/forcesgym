<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KardexResource\Pages;
use App\Filament\Resources\KardexResource\RelationManagers;
use App\Models\Kardex;
use App\Models\ProductRecordSheet;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KardexResource extends Resource
{
    protected static ?string $model = Kardex::class;

    protected static ?string $navigationIcon = 'heroicon-o-switch-vertical';

    protected static ?string $navigationGroup  = 'Inventario';

    protected static ?string $label = 'Kardex';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Group::make()->schema([
                        Forms\Components\Select::make('product_record_sheet_id')
                            ->label('Código de Hoja de registros')
                            ->placeholder('Seleccione una hoja de registros')
                            ->relationship('productRecordSheet', 'code_item')
                            ->lazy()
                            ->afterStateUpdated(
                                fn (string $context, $state, callable $set) =>
                                [
                                    $productRecordSheet = ProductRecordSheet::find($state),
                                    $product_id = $productRecordSheet ? $productRecordSheet->product->id : null,
                                    $set('product_id', $product_id ? $productRecordSheet->product->id : null),

                                    $unit_price = $productRecordSheet ? $productRecordSheet->base_price : null,
                                    $set('unit_price', $unit_price),

                                    $stock = $productRecordSheet ? $productRecordSheet->product->stock : null,
                                    $set('previous_stock', $stock),
                                ]
                            )
                            ->required(),

                        Forms\Components\TextInput::make('code_item')
                            ->label('Código del Kardex')
                            ->default('KAR-' . date('Y') . '-0000' . Kardex::count() + 1)
                            ->disabled()
                            ->dehydrated()
                            ->required(),

                        Forms\Components\DateTimePicker::make('movement_date')
                            ->label('Fecha y hora')
                            ->timezone('America/Lima')
                            ->default(now())
                            ->disabled()
                            ->required(),

                        Forms\Components\Select::make('responsible_id')
                            ->label('Responsable')
                            ->relationship('responsible', 'name')
                            ->required(),
                    ])->columns(2),

                    Group::make()->schema([
                        Forms\Components\Select::make('product_id')
                            ->relationship('product', 'name')
                            ->label('Producto')
                            ->disabled()
                            ->required(),

                        Forms\Components\Select::make('supplier_id')
                            ->label('Proveedor')
                            ->relationship('supplier', 'name')
                            ->required(),

                        Forms\Components\TextInput::make('previous_stock')
                            ->label('Stock anterior')
                            ->disabled()
                            ->required(),

                        Forms\Components\Select::make('type_movement')
                            ->label('Tipo de movimiento')
                            ->options([
                                'Entrada' => 'Entrada',
                                'Salida' => 'Salida'
                            ])
                            ->reactive()
                            ->afterStateUpdated(
                                fn (string $context, $state, callable $set) =>
                                [
                                    $type_movement = $state,
                                    $set('input_quantity', $type_movement == 'Entrada' ? 1 : 0),
                                    $set('output_quantity', $type_movement == 'Salida' ? 1 : 0),
                                ]
                            )
                            ->required(),

                        Forms\Components\TextInput::make('unit_price')
                            ->label('Precio unitario $/.')
                            ->disabled()
                            ->required(),

                        Forms\Components\TextInput::make('total_price')
                            ->label('Precio total $/.')
                            ->disabled()
                            ->placeholder(function (Closure $get) {
                                $input_quantity = $get('input_quantity');
                                $output_quantity = $get('output_quantity');
                                $unit_price = $get('unit_price');
                                $quantity = $input_quantity + $output_quantity;
                                $total_price = $unit_price * $quantity;
                                return $total_price;
                            }),
                    ])->columns(2),

                    Group::make()->schema([
                        Forms\Components\TextInput::make('input_quantity')
                            ->label('Cantidad de entrada')
                            ->numeric()
                            ->reactive()
                            ->required(),

                        Forms\Components\TextInput::make('output_quantity')
                            ->label('Cantidad de salida')
                            ->reactive()
                            ->numeric()
                            ->required(),

                        Forms\Components\TextInput::make('current_stock')
                            ->label('Stock actual')
                            ->placeholder(function (Closure $get) {
                                $quantity = $get('previous_stock');
                                $input_quantity = $get('input_quantity');
                                $output_quantity = $get('output_quantity');
                                $current_stock = $quantity + $input_quantity - $output_quantity;
                                return $current_stock;
                            })
                            ->disabled(),
                    ])->columns(3),

                    Group::make()->schema([
                        Forms\Components\Select::make('type_document')
                            ->label('Comprobante de pago')
                            ->options([
                                'Factura' => 'Factura',
                                'Boleta' => 'Boleta',
                                'Guía de remisión' => 'Guía de remisión',
                            ])
                            ->required(),

                        FileUpload::make('document')
                            ->label('Comprobante de pago (PDF) <> (Imagen)')
                            ->imagePreviewHeight('250')
                            ->loadingIndicatorPosition('left')
                            ->panelLayout('integrated')
                            ->removeUploadedFileButtonPosition('right')
                            ->uploadButtonPosition('left')
                            ->uploadProgressIndicatorPosition('left'),
                    ]),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product_id'),
                Tables\Columns\TextColumn::make('responsible_id'),
                Tables\Columns\TextColumn::make('supplier_id'),
                Tables\Columns\TextColumn::make('product_record_sheet_id'),
                Tables\Columns\TextColumn::make('code_item'),
                Tables\Columns\TextColumn::make('type_document'),
                Tables\Columns\TextColumn::make('document'),
                Tables\Columns\TextColumn::make('movement_date')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('unit_price'),
                Tables\Columns\TextColumn::make('total_price'),
                Tables\Columns\TextColumn::make('previous_stock'),
                Tables\Columns\TextColumn::make('type_movement'),
                Tables\Columns\TextColumn::make('input_quantity'),
                Tables\Columns\TextColumn::make('output_quantity'),
                Tables\Columns\TextColumn::make('current_stock'),
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
            'index' => Pages\ListKardexes::route('/'),
            'create' => Pages\CreateKardex::route('/create'),
            'edit' => Pages\EditKardex::route('/{record}/edit'),
        ];
    }
}
