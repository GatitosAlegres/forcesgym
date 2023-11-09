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
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\Filter;
use Filament\Notifications\Notification;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-lightning-bolt';

    protected static ?string $navigationGroup  = 'Inventario';

    protected static ?string $label = 'Producto';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->schema([
                    Forms\Components\Group::make()->schema([

                        Forms\Components\Card::make()->schema([
                            Forms\Components\TextInput::make('name')
                                ->required()
                                ->maxLength(20)
                                ->name('Nombre')
                                ->lazy()
                                ->afterStateUpdated(fn (string $context, $state, callable $set) => $context === 'create' ?
                                    $set('slug', (str_replace(' ', '_', strtolower($state)) . '_' . date('Y'))) : null),

                            Forms\Components\TextInput::make('slug')
                                ->label('Slug')
                                ->disabled()
                                ->dehydrated()
                                ->required(),

                            Forms\Components\MarkdownEditor::make('description')
                                ->required()
                                ->name('Descripción')
                                ->columnSpan('full'),
                        ])->columns(2),

                        Forms\Components\Section::make('Imagen')->schema([
                            Forms\Components\FileUpload::make('image')
                                ->label('Featured Image')
                                ->image()
                                ->directory('products')
                                ->enableDownload()
                                ->acceptedFileTypes(['image/*'])
                                ->disk('s3')
                        ]),

                        Section::make('Precios')->schema([
                            Forms\Components\TextInput::make('purchase_price')
                                ->numeric()
                                ->minValue(1)
                                ->name('Costo por unidad')
                                ->helperText('No será visible para el cliente.')
                                ->required(),

                            Forms\Components\TextInput::make('base_price')
                                ->numeric()
                                ->minValue(1)
                                ->name('Precio base')
                                ->required(),

                            Forms\Components\TextInput::make('sale_price')
                                ->numeric()
                                ->minValue(1)
                                ->name('Precio de Venta')
                                ->required(),
                        ])->columns(2),

                        Section::make('Inventario')->schema([
                            Forms\Components\TextInput::make('stock')
                                ->numeric()
                                ->minValue(1)
                                ->name('Stock')
                                ->required(),

                            Forms\Components\TextInput::make('security_stock')
                                ->numeric()
                                ->minValue(1)
                                ->name('Stock de Seguridad')
                                ->helperText('El stock de seguridad es el stock límite de tus productos que te avisa si el stock del producto pronto se agotará.')
                                ->required(),

                            Forms\Components\TextInput::make('barcode')
                                ->label('Barcode (ISBN, UPC, GTIN, etc.)')
                                ->unique(Product::class, 'barcode', ignoreRecord: true)
                                ->required(),
                        ])->columns(2),

                    ])->columnSpan(['lg' => 2]),

                    Forms\Components\Group::make()->schema([

                        Section::make('Asociaciones')->schema([
                            Forms\Components\Select::make('category_id')
                                ->relationship('category', 'name')
                                ->required()
                                ->name('Categoría')
                                ->label('Categoría')
                                ->createOptionForm([
                                    Forms\Components\TextInput::make('name')
                                        ->label('Nombre de la categoría')
                                        ->required(),
                                ]),

                            Forms\Components\Select::make('supplier_id')
                                ->relationship('supplier', 'name')
                                ->required()
                                ->name('Marca')
                                ->label('Marca')
                                ->createOptionForm([
                                    Grid::make()->schema([
                                        Forms\Components\TextInput::make('name')
                                            ->required()
                                            ->maxLength(255)
                                            ->name("Nombre o Razón Social de la marca"),

                                        Forms\Components\Select::make('type')
                                            ->options([
                                                'natural' => 'natural',
                                                'juridico' => 'juridico',
                                            ])
                                            ->required()
                                            ->name("Tipo de proveedor"),

                                        Forms\Components\TextInput::make('phone')
                                            ->tel()
                                            ->required()
                                            ->maxLength(255)
                                            ->name("Teléfono"),

                                        Forms\Components\TextInput::make('email')
                                            ->email()
                                            ->required()
                                            ->maxLength(255)
                                            ->name("Correo electrónico"),

                                        Forms\Components\TextInput::make('address')
                                            ->required()
                                            ->maxLength(65535)
                                            ->name("Dirección")
                                            ->columnSpanFull(),
                                    ])->columns(2),
                                ]),
                        ]),

                        Forms\Components\Section::make('Envíos')->schema([

                            Forms\Components\Checkbox::make('backorder')
                                ->label('Este producto se puede devolver.'),

                            Forms\Components\Checkbox::make('requires_shipping')
                                ->label('Este producto se puede enviar a domicilio.'),
                        ]),

                        Forms\Components\Section::make('Estado')->schema([
                            Forms\Components\Toggle::make('is_visible')
                                ->label('Visibilidad')
                                ->helperText('Este producto estará visible en la tienda.')
                                ->default(true),

                            Forms\Components\DatePicker::make('created_at')
                                ->label('Disponibilidad')
                                ->default(now())
                                ->required(),
                        ]),

                    ])->columnSpan(['lg' => 1]),
                ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_url')
                    ->label("Imagen"),

                Tables\Columns\TextColumn::make('name')
                    ->label("Nombre")->searchable()->sortable(),

                Tables\Columns\TextColumn::make('supplier.name')
                    ->label("Marca")->searchable()->sortable()->toggleable(),

                Tables\Columns\TextColumn::make('category.name')
                    ->label('Categoría')->searchable()->sortable()->toggleable(),

                Tables\Columns\TextColumn::make('base_price')
                    ->label("Precio base")->searchable()->sortable()->toggleable(),

                Tables\Columns\TextColumn::make('purchase_price')
                    ->label("Precio de Compra")->searchable()->sortable()->toggleable(),

                Tables\Columns\TextColumn::make('sale_price')
                    ->label("Precio de Venta")->searchable()->sortable()->toggleable(),

                Tables\Columns\BadgeColumn::make('slug')
                    ->label('Slug')->color('primary')->searchable()->sortable()->toggleable(),

                Tables\Columns\BadgeColumn::make('stock')
                    ->label("Stock")->color('success')->alignCenter()->sortable()->toggleable(),

                Tables\Columns\BadgeColumn::make('security_stock')
                    ->label("Stock de Seguridad")->color('danger')->alignCenter()->sortable()->toggleable(),

                Tables\Columns\BooleanColumn::make('is_visible')
                    ->label('Visibilidad')->sortable()->toggleable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha de disponibilidad')->date()->sortable()->toggleable()->toggledHiddenByDefault(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category_id')
                    ->options(
                        \App\Models\Category::all()->pluck('name', 'id')
                    )
                    ->label('Categorias')
                    ->placeholder('Todos')
                    ->multiple()
                    ->searchable(),

                Tables\Filters\SelectFilter::make('brand_id')
                    ->options(
                        \App\Models\Supplier::all()->pluck('name', 'id')
                    )
                    ->label('Marcas')
                    ->placeholder('Todos')
                    ->multiple()
                    ->searchable(),

                Tables\Filters\SelectFilter::make('is_visible')
                    ->options([
                        true => 'Visible',
                        false => 'Oculto',
                    ])
                    ->placeholder('Todos')
                    ->label('Visibilidad'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                ExportBulkAction::make(),
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
            'report' => Pages\ReportProduct::route('/report'),
        ];
    }

    protected static function getNavigationBadge(): ?string
    {
        return static::$model::count();
    }
}
