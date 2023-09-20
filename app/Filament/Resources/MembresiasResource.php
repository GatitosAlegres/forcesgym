<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MembresiasResource\Pages;
use App\Filament\Resources\MembresiasResource\RelationManagers;
use App\Models\Membresias;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Tables\Columns\ColorColumn;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MembresiasResource\Widgets\StatsOverview;
use App\Models\User;


class MembresiasResource extends Resource
{
    protected static ?string $model = Membresias::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';
    protected static ?string $navigationGroup  = 'Gestion de clases';

    public static function form(Form $form): Form
    {
        $roleName = 'cliente';
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('User', 'name')
                    ->options(
                        User::whereHas('roles', function ($query) use ($roleName) {
                            $query->where('name', $roleName);
                        })->pluck('name', 'id')
                    )
                    ->label('Cliente')
                    ->required(),
                Forms\Components\Select::make('tipo_membresia_id')
                    ->relationship('tipo_membresia', 'nombre_tipo_membresia')
                    ->required(),
                Forms\Components\TextInput::make('descripcion')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\DatePicker::make('fecha_inicio'),
                Forms\Components\Toggle::make('activo')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Cliente'),
                Tables\Columns\TextColumn::make('tipo_membresia.nombre_tipo_membresia')->sortable()->searchable()
                    ->label('Tipo de Membresia'),
                Tables\Columns\TextColumn::make('descripcion'),
                Tables\Columns\TextColumn::make('precio')
                    ->label('Precio S/.'),
                Tables\Columns\IconColumn::make('activo')
                    ->boolean(),
                Tables\Columns\TextColumn::make('fecha_inicio')
                    ->date(),
                Tables\Columns\TextColumn::make('fecha_fin')
                    ->date(),
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
        return static::getModel()::query()->count();
    }

    public static function getWidgets(): array
    {
        return [
            StatsOverview::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMembresias::route('/'),
            'create' => Pages\CreateMembresias::route('/create'),
            'edit' => Pages\EditMembresias::route('/{record}/edit'),
        ];
    }
}
