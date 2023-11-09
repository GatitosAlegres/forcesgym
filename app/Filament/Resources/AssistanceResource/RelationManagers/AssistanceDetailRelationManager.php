<?php

namespace App\Filament\Resources\AssistanceResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\AssistanceDetail;

class AssistanceDetailRelationManager extends RelationManager
{
    protected static string $relationship = 'AssistanceDetail';

    protected static ?string $recordTitleAttribute = 'assistance_id';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('clase_entrenamiento.codigo')
                    ->relationship('clase_entrenamiento', 'codigo')
                    ->required(),
                Forms\Components\Select::make('user_id')
                    ->relationship('User', 'name')
                    ->required(),
                Forms\Components\Toggle::make('estado_asistencia')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('socio.nombreCliente')
                    ->label('Cliente'),
                Tables\Columns\IconColumn::make('estado_asistencia')
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
            ]);
    }
}
