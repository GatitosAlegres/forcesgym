<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use App\Http\Controllers\PDFController;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\RemisionGuideResource\Pages;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use App\Filament\Resources\RemisionGuideResource\RelationManagers;
use App\Models\RemisionGuide;

class RemisionGuideResource extends Resource
{
    protected static ?string $model = RemisionGuide::class;

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
                Forms\Components\FileUpload::make('artifact')
                    ->directory('remision_guides')
                    ->name('Archivo')
                    ->acceptedFileTypes(['image/*', 'application/pdf'])
                    ->enableDownload()
                    ->disk('s3')
                    ->required(),
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
                Tables\Columns\IconColumn::make("artifact_url")
                    ->options([
                        'heroicon-o-document'
                    ])
                    ->colors([
                        'success',
                    ])
                    ->action(
                        fn (RemisionGuide $record) => $record->file_url
                            ? PDFController::redirectToPDFViewer($record->file_url)
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
            'index' => Pages\ListRemisionGuide::route('/'),
            'create' => Pages\CreateRemisionGuide::route('/create'),
            'edit' => Pages\EditRemisionGuide::route('/{record}/edit'),
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
