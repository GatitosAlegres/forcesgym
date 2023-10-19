<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SocioResource\Pages;
use App\Filament\Resources\SocioResource\RelationManagers;
use App\Models\Socio;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SocioResource extends Resource
{
    protected static ?string $model = Socio::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup  = 'Gestion de clases';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombreCliente')
                    ->required(),
                Forms\Components\Select::make('tipo_membresia_id')
                    ->relationship('tipo_membresia', 'nombre_tipo_membresia')
                    ->required(),
                Forms\Components\TextInput::make('descripcion')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\DatePicker::make('fecha_inscripcion'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombreCliente'),
                Tables\Columns\TextColumn::make('tipo_membresia.nombre_tipo_membresia')
                    ->label('Tipo de Membresia'),
                Tables\Columns\TextColumn::make('descripcion'),
                Tables\Columns\TextColumn::make('fecha_inscripcion')
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSocios::route('/'),
            'create' => Pages\CreateSocio::route('/create'),
            'edit' => Pages\EditSocio::route('/{record}/edit'),
        ];
    }
}
