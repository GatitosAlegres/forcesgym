<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Purchase;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PurchaseResource\Pages;

use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PurchaseResource\RelationManagers;
use App\Filament\Resources\PurchaseResource\RelationManagers\PurchaseDetailRelationManager;
use App\Filament\Resources\PurchaseResource\Widgets\PurchaseStats;
use App\Models\Category;
use App\Models\RemisionGuide;

class PurchaseResource extends Resource
{
    protected static ?string $model = Purchase::class;

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
                    ->columnSpan(['lg' => fn (?Purchase $record) => $record === null ? 3 : 2]),

                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Placeholder::make('invoice_number')
                            ->label('Proveedor')
                            ->content(fn (Purchase $record): ?string => $record->supplier->name),
                        Forms\Components\Placeholder::make('warranty_code')
                            ->label('Expiración de Garantia')
                            ->content(fn (Purchase $record): ?string => $record->warranty?->expiration_date),
                        Forms\Components\Placeholder::make('total_price')
                            ->label('Monto total')
                            ->content(fn (Purchase $record): ?string => $record->currency . ' ' . $record->total_price),
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Creado en')
                            ->content(fn (Purchase $record): ?string => $record->created_at?->diffForHumans()),
                    ])
                    ->columnSpan(['lg' => 1])
                    ->hidden(fn (?Purchase $record) => $record === null),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('remision_guide.guia_code')
                    ->label('Guia de remisión'),
                Tables\Columns\TextColumn::make('invoice.invoice_number')
                    ->label('Número de factura'),
                Tables\Columns\TextColumn::make('supplier.name')
                    ->label('Proveedor'),
                Tables\Columns\TextColumn::make('warranty.warranty_code')
                    ->label('Código de garantia'),
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
            ->filters([

                Tables\Filters\SelectFilter::make('guia_remision_id')
                    ->placeholder('Guia de remisión')
                    ->options(\App\Models\RemisionGuide::all()->pluck('guia_code', 'id')),
            ])
            ->actions([
                Tables\Actions\Action::make('Download Pdf')
                    ->icon('heroicon-o-document-download')
                    ->url(fn (Purchase $record) => route('purchase.pdf.download', $record))
                    ->openUrlInNewTab(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                ExportBulkAction::make()
            ]);
    }

    public static function getWidgets(): array
    {
        return [
            PurchaseStats::class,
        ];
    }

    public static function getRelations(): array
    {
        return [
            PurchaseDetailRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPurchase::route('/'),
            'create' => Pages\CreatePurchase::route('/create'),
            'edit' => Pages\EditPurchase::route('/{record}/edit'),
            'report' => Pages\ReportPurchase::route('/report'),
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
            Forms\Components\Select::make('supplier_id')
                ->options(\App\Models\Supplier::all()->pluck('name', 'id'))
                ->required()
                ->label('Proveedor'),
            Forms\Components\DatePicker::make('issue_date')
                ->default(now())
                ->required()
                ->label('Fecha de emisión'),

            Forms\Components\Select::make('remision_guide_id')
                ->relationship('remision_guide', 'guia_code')
                ->required()
                ->searchable()
                ->createOptionForm([
                    Forms\Components\TextInput::make('guia_code')
                        ->default('GR-')
                        ->required()
                        ->maxLength(255)
                        ->label('Código de Guia'),
                    Forms\Components\FileUpload::make('artifact')
                        ->required()
                        ->directory('remision_guides')
                        ->acceptedFileTypes(['image/*', 'application/pdf'])
                        ->enableDownload()
                        ->disk('s3')
                        ->label('Archivo'),
                    Forms\Components\TextInput::make('RUC_carrier')
                        ->required()
                        ->numeric()
                        ->maxLength(255)
                        ->label('RUC de transportista'),
                    Forms\Components\TextInput::make('weight')
                        ->numeric()
                        ->required()
                        ->label('Peso'),
                    Forms\Components\DatePicker::make('delivery_date')
                        ->required()
                        ->label('Fecha de entrega'),
                    Forms\Components\MarkdownEditor::make('observations')
                        ->columnSpan('full')
                        ->label('Observaciones'),
                    Forms\Components\Toggle::make('according')
                        ->required()
                        ->label('Conforme')
                ])
                ->createOptionAction(function (Forms\Components\Actions\Action $action) {
                    return $action
                        ->modalHeading('Crear Guia de remisión')
                        ->modalButton('Crear Guia de remisión')
                        ->modalWidth('lg');
                })
                ->label('Guia de remisión'),

            Forms\Components\Select::make('invoice_id')
                ->relationship('invoice', 'invoice_number')
                ->required()
                ->searchable()
                ->createOptionForm([
                    Forms\Components\TextInput::make('invoice_number')
                        ->required()
                        ->default('FAC-')
                        ->maxLength(255)
                        ->name('Número de factura'),
                    Forms\Components\FileUpload::make('artifact')
                        ->required()
                        ->directory('invoices')
                        ->acceptedFileTypes(['image/*', 'application/pdf'])
                        ->enableDownload()
                        ->disk('s3')
                        ->name('Archivo'),
                    Forms\Components\Select::make('supplier_id')
                        ->options(\App\Models\Supplier::all()->pluck('name', 'id'))
                        ->required()
                        ->name('Proveedor'),
                    Forms\Components\DatePicker::make('due_date')
                        ->required()
                        ->label('Fecha de vencimiento'),
                    Forms\Components\TextInput::make('total_amount')
                        ->required()
                        ->numeric()
                        ->name('Monto total'),
                    Forms\Components\Toggle::make('paid')
                        ->required()
                        ->name('Pagado'),
                ])
                ->createOptionAction(function (Forms\Components\Actions\Action $action) {
                    return $action
                        ->modalHeading('Crear Factura')
                        ->modalButton('Crear Factura')
                        ->modalWidth('lg');
                })
                ->label('Factura'),
            Forms\Components\Select::make('warranty_id')
                ->relationship('warranty', 'warranty_code')
                ->required()
                ->searchable()
                ->createOptionForm([
                    Forms\Components\TextInput::make('warranty_code')
                        ->required()
                        ->default('GT-')
                        ->maxLength(255)
                        ->label('Codigo de garantia'),
                    Forms\Components\DatePicker::make('initial_date')
                        ->required()
                        ->label('Fecha de inicio'),
                    Forms\Components\DatePicker::make('expiration_date')
                        ->required()
                        ->label('Fecha de vencimiento'),
                    Forms\Components\FileUpload::make('artifact')
                        ->required()
                        ->directory('warranties')
                        ->acceptedFileTypes(['image/*', 'application/pdf'])
                        ->enableDownload()
                        ->disk('s3')
                        ->name('Archivo'),
                ])
                ->createOptionAction(function (Forms\Components\Actions\Action $action) {
                    return $action
                        ->modalHeading('Crear Garantia')
                        ->modalButton('Crear Garantia')
                        ->modalWidth('lg');
                })
                ->label('Garantia'),
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
