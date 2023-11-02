<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductRecordSheetResource\Pages;
use App\Filament\Resources\ProductRecordSheetResource\RelationManagers;
use App\Filament\Resources\ProductRecordSheetResource\Widgets\ProductRecordSheetStats;
use App\Models\Kardex;
use App\Models\Product;
use App\Models\ProductRecordSheet;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductRecordSheetResource extends Resource
{
    protected static ?string $model = ProductRecordSheet::class;

    protected static ?string $navigationIcon = 'heroicon-o-table';

    protected static ?string $navigationGroup  = 'Inventario';

    protected static ?string $label = 'Hoja de registros';

    protected static ?string $recordTitleAttribute = 'number';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Card::make()
                            ->schema(static::getFormSchema())
                            ->columns(2),

                        Forms\Components\Section::make('Kardex Items')
                            ->schema(static::getFormSchema('kardex')),
                    ]),
                //->columnSpan(['lg' => fn (? Kardex $record) => $record === null ? 3 : 2]),

                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Fecha de registro'), //->content(fn (Kardex $record): ?string => $record->created_at?->diffForHumans()),

                        Forms\Components\Placeholder::make('updated_at')
                            ->label('Fecha de actualización')
                        //->content(fn (Kardex $record): ?string => $record->updated_at?->diffForHumans()),
                    ])
                    ->columnSpan(['lg' => 1])
                //->hidden(fn (?Kardex $record) => $record === null),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code_item')
                    ->label('Código')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('product.name')
                    ->label('Producto')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Descripción')
                    ->toggleable()
                    ->toggledHiddenByDefault(),
                Tables\Columns\TextColumn::make('category')
                    ->label('Categoría')
                    ->sortable()
                    ->toggleable()
                    ->toggledHiddenByDefault(),
                Tables\Columns\TextColumn::make('base_price')
                    ->label('Precio base')
                    ->toggleable()
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('minimum_replacement_stock')
                    ->label('Stock mínimo de reposición')
                    ->toggleable()
                    ->sortable()
                    ->color('primary')
                    ->alignCenter(),
                Tables\Columns\BadgeColumn::make('unit_of_measurement')
                    ->label('Unidad de medida')
                    ->toggleable()
                    ->sortable()
                    ->colors([
                        'Unidad' => 'primary',
                        'Docena' => 'secondary',
                        'Kilogramo' => 'success',
                        'Litro' => 'warning',
                        'Metro' => 'danger',
                    ])
                    ->alignCenter(),
                Tables\Columns\BadgeColumn::make('replacement_quantity')
                    ->label('Cantidad de reposición')
                    ->toggleable()
                    ->sortable()
                    ->color('success')
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable()
                    ->toggledHiddenByDefault(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable()
                    ->toggledHiddenByDefault(),
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

    public static function getWidgets(): array
    {
        return [
            ProductRecordSheetStats::class,
        ];
    }

    protected static function getNavigationBadge(): ?string
    {
        return static::$model::count();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductRecordSheets::route('/'),
            'create' => Pages\CreateProductRecordSheet::route('/create'),
            'edit' => Pages\EditProductRecordSheet::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->withoutGlobalScope(SoftDeletingScope::class);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['code_item', 'product.name'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return ['Product' => optional($record->product)->name];
    }

    public static function getGlobalSearchEloquentQuery(): Builder
    {
        return parent::getGlobalSearchEloquentQuery()->with(['product', 'kardex']);
    }

    public static function getFormSchema(string $section = null): array
    {
        if ($section === 'kardex') {
            return [
                Repeater::make('kardex')
                    ->relationship()
                    ->schema([
                        Group::make()->schema([
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
                                ->searchable()
                                ->relationship('responsible', 'name')
                                ->default(fn () => auth()->user()->id)
                                ->required(),
                        ])->columns(2),

                        Group::make()->schema([
                            Forms\Components\Select::make('product_id')
                                ->relationship('product', 'name')
                                ->searchable()
                                ->label('Producto')
                                ->lazy()
                                ->afterStateUpdated(
                                    fn (string $context, $state, callable $set) =>
                                    [
                                        $product = Product::find($state),
                                        $base_price = $product ? $product->base_price : null,
                                        $set('unit_price', $base_price),

                                        $stock = $product ? $product->stock : null,
                                        $set('previous_stock', $stock),

                                        $supplier = $product ? $product->supplier : null,
                                        $set('supplier_id', $supplier ? $supplier->id : null),
                                    ]
                                )->required(),

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
                                ->numeric()
                                ->required(),

                            Forms\Components\TextInput::make('total_price')
                                ->label('Precio total $/.')
                                ->numeric()
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

                            Forms\Components\Select::make('state')
                                ->label('Estado del comprobante de pago')
                                ->options([
                                    'Pagado' => 'Pagado',
                                    'Pendiente' => 'Pendiente',
                                ])
                                ->required(),

                            FileUpload::make('document')
                                ->label('Comprobante de pago (PDF) <> (Imagen)')
                                ->imagePreviewHeight('250')
                                ->loadingIndicatorPosition('left')
                                ->panelLayout('integrated')
                                ->removeUploadedFileButtonPosition('right')
                                ->uploadButtonPosition('left')
                                ->uploadProgressIndicatorPosition('left')
                                ->columnSpanFull(),
                        ])->columns(2),
                    ])
            ];
        }

        return [
            Grid::make()->schema([
                TextInput::make('code_item')
                    ->label('Código de la Hoja de Registro de Movimientos')
                    ->default('HRM-00000000' . ProductRecordSheet::count() + 1)
                    ->disabled()
                    ->dehydrated()
                    ->required(),

                MarkdownEditor::make('description')
                    ->label('Descripción')
                    ->required(),
            ])->columns(1),

            Section::make('Producto')
                ->schema([
                    Group::make()
                        ->schema([
                            Select::make('product_id')
                                ->label('Nombre')
                                ->placeholder('Seleccione un producto')
                                ->relationship('product', 'name')
                                ->searchable()
                                ->reactive()
                                ->required()
                                ->lazy()
                                ->afterStateUpdated(fn (string $context, $state, callable $set) =>
                                [
                                    $product = Product::find($state),
                                    $category = $product ? $product->category : null,
                                    $set('category', $category ? $category->name : null),
                                    $base_price = $product ? $product->base_price : null,
                                    $set('base_price', $base_price ? $product->base_price : null),
                                ]),


                            TextInput::make('category')
                                ->label('Categoría')
                                ->required()
                                ->disabled(),
                        ])->columns(2),

                    Group::make()
                        ->schema([
                            TextInput::make('base_price')
                                ->label('Precio base $/.')
                                //->disabled()
                                ->required(),
                            Select::make('unit_of_measurement')
                                ->required()
                                ->label('Unidad de medida')
                                ->options([
                                    'Unidad' => 'Unidad',
                                    'Docena' => 'Docena',
                                    'Kilogramo' => 'Kilogramo',
                                    'Litro' => 'Litro',
                                    'Metro' => 'Metro',
                                ]),
                            TextInput::make('minimum_replacement_stock')
                                ->label('Stock mínimo de reposición')
                                ->minValue(1)
                                ->numeric()
                                ->required(),
                            TextInput::make('replacement_quantity')
                                ->label('Cantidad de reposición')
                                ->minValue(1)
                                ->numeric()
                                ->required(),
                        ])->columns(2),
                ]),
        ];
    }
}
