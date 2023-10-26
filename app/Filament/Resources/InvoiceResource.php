<?php

namespace App\Filament\Resources;

use Dompdf\Dompdf;
use Filament\Forms;
use Filament\Tables;
use App\Models\Invoice;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Pages\Actions\ViewAction;
use App\Http\Controllers\PDFController;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\InvoiceResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use App\Filament\Resources\InvoiceResource\RelationManagers;

class InvoiceResource extends Resource
{
    protected static ?string $model = Invoice::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup  = 'Compras';

    protected static ?string $label = 'Facturas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('file_path')
                    ->required()
                    ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.ms-excel', 'image/*'])
                    ->name('Archivo'),
                Forms\Components\TextInput::make('invoice_number')
                    ->required()
                    ->default('FAC-')
                    ->maxLength(255)
                    ->name('Número de factura'),
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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('invoice_number')
                    ->label('Número de factura'),
                Tables\Columns\IconColumn::make("file_path")
                    ->options([
                        'heroicon-o-document'
                    ])
                    ->colors([
                        'success',
                    ])
                    ->action(
                        fn (Invoice $record) => $record->file_path
                            ? PDFController::redirectToPDFViewer($record->file_path)
                            : null
                    )
                    ->label('Archivo'),
                Tables\Columns\TextColumn::make('supplier.name')->searchable()->sortable()->label('Proveedor'),
                Tables\Columns\TextColumn::make('due_date')
                    ->label('Fecha de vencimiento')
                    ->date(),
                Tables\Columns\TextColumn::make('total_amount')
                    ->label('Monto total'),
                Tables\Columns\IconColumn::make('paid')
                    ->label('Pagado')
                    ->boolean(),
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
                ExportBulkAction::make()
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
            'index' => Pages\ListInvoices::route('/'),
            'create' => Pages\CreateInvoice::route('/create'),
            'edit' => Pages\EditInvoice::route('/{record}/edit'),
        ];
    }

    protected static function getNavigationBadge(): ?string
    {
        return static::$model::count();
    }
}
