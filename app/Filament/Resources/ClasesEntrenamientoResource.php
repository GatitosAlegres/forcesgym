<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClasesEntrenamientoResource\Pages;
use App\Filament\Resources\ClasesEntrenamientoResource\RelationManagers;
use App\Models\ClasesEntrenamiento;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\User;

class ClasesEntrenamientoResource extends Resource
{
    protected static ?string $model = ClasesEntrenamiento::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup  = 'Gestion de clases';

    public static function form(Form $form): Form
    {
        $roleName = 'entrenador';
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('User', 'name')
                    ->options(
                        User::whereHas('roles', function ($query) use ($roleName) {
                            $query->where('name', $roleName);
                        })->pluck('name', 'id')
                    )
                    ->label('Entrenador')
                    ->required(),
                Forms\Components\Select::make('tipo_clase_id')
                    ->relationship('tipo_clase', 'nombre_tipo_clase')
                    ->required(),
                Forms\Components\TextInput::make('codigo')
                    ->required(),
                Forms\Components\TextInput::make('descripcion')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('fecha')
                    ->required(),
                Forms\Components\TextInput::make('hora_inicio')
                    ->required(),
                Forms\Components\TextInput::make('hora_fin')
                    ->required(),
                Forms\Components\Toggle::make('activo')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Entrenador'),
                Tables\Columns\TextColumn::make('tipo_clase.nombre_tipo_clase')->sortable()->searchable()
                    ->label('Tipo de Clase'),
                Tables\Columns\TextColumn::make('codigo'),
                Tables\Columns\TextColumn::make('descripcion'),
                Tables\Columns\TextColumn::make('fecha')
                    ->date(),
                Tables\Columns\TextColumn::make('hora_inicio'),
                Tables\Columns\TextColumn::make('hora_fin'),
                Tables\Columns\IconColumn::make('activo')
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    protected static function getNavigationBadge(): ?string {
        return static ::$model::count();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClasesEntrenamientos::route('/'),
            'create' => Pages\CreateClasesEntrenamiento::route('/create'),
            'edit' => Pages\EditClasesEntrenamiento::route('/{record}/edit'),
        ];
    }
}
