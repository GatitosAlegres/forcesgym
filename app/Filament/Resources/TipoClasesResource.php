<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TipoClasesResource\Pages;
use App\Filament\Resources\TipoClasesResource\RelationManagers;
use App\Models\TipoClases;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TipoClasesResource extends Resource
{
    protected static ?string $model = TipoClases::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup  = 'Gestion de clases';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre_tipo_clase')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('descripcion_tipo_clase')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre_tipo_clase'),
                Tables\Columns\TextColumn::make('descripcion_tipo_clase'),
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
        return TipoClases::query()->count();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTipoClases::route('/'),
            'create' => Pages\CreateTipoClases::route('/create'),
            'edit' => Pages\EditTipoClases::route('/{record}/edit'),
        ];
    }
}
