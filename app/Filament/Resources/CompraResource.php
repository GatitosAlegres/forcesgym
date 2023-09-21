<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Compra;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CompraResource\Pages;

use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CompraResource\RelationManagers;
use App\Filament\Resources\CompraResource\RelationManagers\CompradetallesRelationManager;
use App\Filament\Resources\CompraResource\Widgets\CompraStats;
use App\Models\Category;
use App\Models\GuiaRemision;

class CompraResource extends Resource
{
    protected static ?string $model = Compra::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $navigationGroup  = 'Compras';

    protected static ?string $label = 'Compras';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Card::make()
                            ->schema(static::getFormSchema())
                            ->columns(2),

                        Forms\Components\Section::make('Compra items')
                            ->schema(static::getFormSchema('detalles')),
                    ])
                    ->columnSpan(['lg' => fn (?Compra $record) => $record === null ? 3 : 2]),

                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Placeholder::make('invoice_number')
                            ->label('Proveedor')
                            ->content(fn (Compra $record): ?string => $record->invoice?->supplier->name),
                        Forms\Components\Placeholder::make('warranty_code')
                            ->label('Expiración de Garantia')
                            ->content(fn (Compra $record): ?string => $record->warranty?->expiration_date),
                        Forms\Components\Placeholder::make('total_price')
                            ->label('Monto total')
                            ->content(fn (Compra $record): ?string => $record->currency . ' ' . $record->total_price),
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Created at')
                            ->content(fn (Compra $record): ?string => $record->created_at?->diffForHumans()),
                    ])
                    ->columnSpan(['lg' => 1])
                    ->hidden(fn (?Compra $record) => $record === null),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('number')
                ->label('N° Compra'),
                Tables\Columns\TextColumn::make('issue_date')
                    ->date()
                    ->label('Fecha de emisión'),
                Tables\Columns\TextColumn::make('currency')
                    ->label('Moneda'),
                Tables\Columns\TextColumn::make('total_price')
                    ->label('Monto total'),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'danger' => 'cancelado',
                        'warning' => 'procesando',
                        'success' => fn ($state) => in_array($state, ['entregado', 'enviado']),
                    ]),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                ExportBulkAction::make()
            ]);
    }

    public static function getWidgets(): array
    {
        return [
            CompraStats::class,
        ];
    }

    public static function getRelations(): array
    {
        return [
            CompradetallesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompras::route('/'),
            'create' => Pages\CreateCompra::route('/create'),
            'edit' => Pages\EditCompra::route('/{record}/edit'),
        ];
    }

    protected static function getNavigationBadge(): ?string
    {
        return static::$model::count();
    }

    public static function getFormSchema(?string $section = null): array
    {
        if ($section === 'detalles') {
            return [
                Forms\Components\Repeater::make('detalles')
                    ->relationship()
                    ->schema([
                        Forms\Components\Select::make('product_id')
                            ->options(\App\Models\Product::all()->pluck('name', 'id'))
                            ->columnSpan([
                                'md' => 6,
                            ])
                            ->name('Producto'),

                        Forms\Components\Select::make('supplier_id')
                            ->options(\App\Models\Supplier::all()->pluck('name', 'id'))
                            ->columnSpan([
                                'md' => 4,
                            ])
                            ->name('Proveedor'),

                        Forms\Components\TextInput::make('quantity')
                            ->numeric()
                            ->columnSpan([
                                'md' => 2,
                            ])
                            ->required()
                            ->name('Cantidad'),

                        Forms\Components\TextInput::make('unit_price')
                            ->numeric()
                            ->required()
                            ->columnSpan([
                                'md' => 2,
                            ])
                            ->name('Precio unitario'),
                    ])
                    ->defaultItems(1)
                    ->disableLabel()
                    ->columns([
                        'md' => 10,
                    ])
                    ->required(),
            ];
        }

        return [
            Forms\Components\TextInput::make('number')
                ->default('CP-' . random_int(100000, 999999))
                ->disabled()
                ->required()
                ->label('Número de compra'),

            Forms\Components\DatePicker::make('issue_date')
                ->default(now())
                ->required()
                ->label('Fecha de emisión'),
            Forms\Components\Select::make('status')
                ->options([
                    'nuevo' => 'Nuevo',
                    'procesando' => 'Procesando',
                    'entregado' => 'Entregado',
                    'enviado' => 'Enviado',
                    'cancelado' => 'Cancelado',
                ])
                ->required()
                ->label('Estado'),

            Forms\Components\Select::make('currency')
                ->options([
                    'PEN' => 'SOL PERUANO (PEN)',
                    'USD' => 'DOLAR AMERICANO (USD)',
                ])
                ->required()
                ->label('Moneda'),

            Forms\Components\MarkdownEditor::make('notes')
                ->columnSpan('full')
                ->label('Notas'),
        ];
    }
}
