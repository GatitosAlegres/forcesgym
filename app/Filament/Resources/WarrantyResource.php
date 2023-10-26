<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Warranty;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use App\Http\Controllers\PDFController;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\WarrantyResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use App\Filament\Resources\WarrantyResource\RelationManagers;

class WarrantyResource extends Resource
{
    protected static ?string $model = Warranty::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-list';

    protected static ?string $navigationGroup  = 'Compras';

    protected static ?string $label = 'Garantias';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('warranty_code')
                    ->default('GT-')
                    ->required(),
                Forms\Components\DatePicker::make('initial_date')
                    ->required()
                    ->label('Fecha de inicio'),
                Forms\Components\DatePicker::make('expiration_date')
                    ->required()
                    ->label('Fecha de vencimiento'),
                Forms\Components\FileUpload::make('file_path')
                    ->required()
                    ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.ms-excel', 'image/*'])
                    ->name('Archivo'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('warranty_code')
                    ->label('Código de garantía'),
                Tables\Columns\TextColumn::make('initial_date')
                    ->date()
                    ->label('Fecha de inicio'),
                Tables\Columns\TextColumn::make('expiration_date')
                    ->date()
                    ->label('Fecha de vencimiento'),
                Tables\Columns\IconColumn::make("file_path")
                    ->options([
                        'heroicon-o-document'
                    ])
                    ->colors([
                        'success',
                    ])
                    ->action(
                        fn (Warranty $record) => $record->file_path
                            ? PDFController::redirectToPDFViewer($record->file_path)
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
            'index' => Pages\ListWarranties::route('/'),
            'create' => Pages\CreateWarranty::route('/create'),
            'edit' => Pages\EditWarranty::route('/{record}/edit'),
        ];
    }

    protected static function getNavigationBadge(): ?string
    {
        return static::$model::count();
    }
}
