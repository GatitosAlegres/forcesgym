<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AsistenciaDetalleResource\Pages;
use App\Filament\Resources\AsistenciaDetalleResource\RelationManagers;
use App\Models\AsistenciaDetalle;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\User;

class AsistenciaDetalleResource extends Resource
{
    protected static ?string $model = AsistenciaDetalle::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard';
    protected static ?string $navigationGroup  = 'Gestion de clases';

    public static function form(Form $form): Form
    {
        $roleName = 'cliente';
        return $form
            ->schema([
                Forms\Components\Select::make('clase_entrenamiento_id')
                    ->relationship('clase_entrenamiento', 'codigo')
                    ->required(),
                Forms\Components\Select::make('user_id')
                    ->relationship('User', 'name')
                    ->options(
                        User::whereHas('roles', function ($query) use ($roleName) {
                            $query->where('name', $roleName);
                        })->pluck('name', 'id')
                    )
                    ->required(),
                Forms\Components\Toggle::make('estado_asistencia')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('clase_entrenamiento.codigo')
                    ->label('Codigo de Clase'),
                Tables\Columns\TextColumn::make('user.name')
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    protected static function getNavigationBadge(): ?string {
        return AsistenciaDetalle::query()->count();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAsistenciaDetalles::route('/'),
            'create' => Pages\CreateAsistenciaDetalle::route('/create'),
            'edit' => Pages\EditAsistenciaDetalle::route('/{record}/edit'),
        ];
    }
}
