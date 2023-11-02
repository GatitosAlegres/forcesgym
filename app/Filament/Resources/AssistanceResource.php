<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AssistanceResource\Pages;
use App\Filament\Resources\AssistanceResource\RelationManagers;
use App\Filament\Resources\AssistanceResource\RelationManagers\AssistanceDetailRelationManager;
use App\Models\AssistanceDetail;
use App\Models\Assistance;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class AssistanceResource extends Resource
{
    protected static ?string $model = Assistance::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard';

    protected static ?string $navigationGroup  = 'Gestion de clases';

    protected static ?string $label = 'Asistencia';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('codigo_clase')
                    ->relationship('clase_entrenamiento', 'codigo')
                    ->required(),
                Forms\Components\DatePicker::make('fecha')
                    ->required(),
                Forms\Components\Toggle::make('estado')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('clase_entrenamiento.codigo')
                    ->label('Codigo de Clase'),
                Tables\Columns\TextColumn::make('fecha')
                    ->date(),
                Tables\Columns\IconColumn::make('estado')
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
            AssistanceDetailRelationManager::class,
        ];
    }

    protected static function getNavigationBadge(): ?string
    {
        return Assistance::query()->count();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAssistance::route('/'),
            'create' => Pages\CreateAssistance::route('/create'),
            'edit' => Pages\EditAssistance::route('/{record}/edit'),
        ];
    }
}
