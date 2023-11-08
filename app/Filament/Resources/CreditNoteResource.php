<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\CreditNote;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use App\Http\Controllers\PDFController;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CreditNoteResource\Pages;
use App\Filament\Resources\CreditNoteResource\RelationManagers;

class CreditNoteResource extends Resource
{
    protected static ?string $model = CreditNote::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    protected static ?string $navigationGroup  = 'Compras';

    protected static ?string $label = 'Notas de credito';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('supplier_id')
                    ->options(\App\Models\Supplier::all()->pluck('name', 'id'))
                    ->required()
                    ->label('Proveedor'),
                Forms\Components\Select::make('purchase_id')
                    ->options(\App\Models\Purchase::all()->pluck('number', 'id'))
                    ->required()
                    ->label('Compra'),
                Forms\Components\DatePicker::make('issue_date')
                    ->required()
                    ->label('Fecha de emisión')
                    ->default(now()),
                Forms\Components\TextInput::make('total_amount')
                    ->required()
                    ->label('Monto total')
                    ->placeholder('S/ 0.00')
                    ->numeric(),
                Forms\Components\Select::make('currency')
                    ->options([
                        'PEN' => 'SOL PERUANO (PEN)',
                        'USD' => 'DOLAR AMERICANO (USD)',
                    ])
                    ->required()
                    ->name('Moneda'),
                Forms\Components\FileUpload::make('artifact')
                    ->required()
                    ->acceptedFileTypes(['image/*', 'application/pdf'])
                    ->enableDownload()
                    ->directory('credit_notes')
                    ->disk('s3')
                    ->name('Archivo'),
                Forms\Components\MarkdownEditor::make('observations')
                    ->columnSpan('full')
                    ->name('Observaciones'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('supplier.name')
                    ->label('Proveedor'),
                Tables\Columns\TextColumn::make('issue_date')
                    ->date()
                    ->label('Fecha de emisión'),
                Tables\Columns\TextColumn::make('total_amount')
                    ->label('Monto total'),
                Tables\Columns\TextColumn::make('currency')
                    ->label('Moneda'),
                Tables\Columns\IconColumn::make("artifact_url")
                    ->options([
                        'heroicon-o-document'
                    ])
                    ->colors([
                        'success',
                    ])
                    ->action(
                        fn (CreditNote $record) => $record->artifact_url
                            ? PDFController::redirectToPDFViewer($record->artifact_url)
                            : null
                    )
                    ->label('Archivo'),
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
            'index' => Pages\ListCreditNotes::route('/'),
            'create' => Pages\CreateCreditNote::route('/create'),
            'edit' => Pages\EditCreditNote::route('/{record}/edit'),
        ];
    }

    protected static function getNavigationBadge(): ?string
    {
        return static::$model::count();
    }
}
