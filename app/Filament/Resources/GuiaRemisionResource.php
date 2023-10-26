<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\GuiaRemision;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use App\Http\Controllers\PDFController;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\GuiaRemisionResource\Pages;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use App\Filament\Resources\GuiaRemisionResource\RelationManagers;

class GuiaRemisionResource extends Resource
{
    protected static ?string $model = GuiaRemision::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';

    protected static ?string $navigationGroup  = 'Compras';

    protected static ?string $label = 'Guias de Remision';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('guia_code')
                    ->default('GR-')
                    ->required()
                    ->maxLength(255)
                    ->name('Código de Guia'),
                Forms\Components\FileUpload::make('file_path')
                    ->required()
                    ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.ms-excel', 'image/*'])
                    ->name('Archivo'),
                Forms\Components\TextInput::make('RUC_carrier')
                    ->required()
                    ->numeric()
                    ->maxLength(255)
                    ->name('RUC de transportista'),
                Forms\Components\TextInput::make('weight')
                    ->numeric()
                    ->required()
                    ->name('Peso'),
                Forms\Components\DatePicker::make('delivery_date')
                    ->required()
                    ->name('Fecha de entrega'),
                Forms\Components\MarkdownEditor::make('observations')
                    ->columnSpan('full')
                    ->name('Observaciones'),
                Forms\Components\Toggle::make('according')
                    ->required()
                    ->name('Conforme'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('guia_code')
                    ->label('Código de Guia'),
                Tables\Columns\IconColumn::make("file_path")
                    ->options([
                        'heroicon-o-document'
                    ])
                    ->colors([
                        'success',
                    ])
                    ->action(
                        fn (GuiaRemision $record) => $record->file_path
                            ? PDFController::redirectToPDFViewer($record->file_path)
                            : null
                    )
                    ->label('Archivo'),
                Tables\Columns\TextColumn::make('RUC_carrier')
                    ->label('RUC de transportista'),
                Tables\Columns\TextColumn::make('weight')
                    ->label('Peso'),
                Tables\Columns\TextColumn::make('delivery_date')
                    ->date()
                    ->label('Fecha de entrega'),
                Tables\Columns\IconColumn::make('according')
                    ->boolean()
                    ->label('Conforme'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
                ExportBulkAction::make(),
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
            'index' => Pages\ListGuiaRemisions::route('/'),
            'create' => Pages\CreateGuiaRemision::route('/create'),
            'edit' => Pages\EditGuiaRemision::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    protected static function getNavigationBadge(): ?string
    {
        return static::$model::count();
    }
}
