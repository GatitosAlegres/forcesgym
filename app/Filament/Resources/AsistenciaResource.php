<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AsistenciaResource\Pages;
use App\Filament\Resources\AsistenciaResource\RelationManagers;
use App\Filament\Resources\AsistenciaResource\RelationManagers\AsistenciaDetalleRelationManager;
use App\Models\AsistenciaDetalle;
use App\Models\Asistencia;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class AsistenciaResource extends Resource
{
    protected static ?string $model = Asistencia::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard';
    protected static ?string $navigationGroup  = 'Gestion de clases';


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
            AsistenciaDetalleRelationManager::class,
        ];
    }

    protected static function getNavigationBadge(): ?string {
        return Asistencia::query()->count();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAsistencias::route('/'),
            'create' => Pages\CreateAsistencia::route('/create'),
            'edit' => Pages\EditAsistencia::route('/{record}/edit'),
        ];
    }
}
