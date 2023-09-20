<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VacanteResource\Pages;
use App\Filament\Resources\VacanteResource\RelationManagers;
use App\Models\Vacante;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VacanteResource extends Resource
{
    protected static ?string $model = Vacante::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup  = 'Recursos Humanos';

    protected static ?string $label = 'Vacantes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('cantidad')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre'),
                Tables\Columns\TextColumn::make('cantidad'),
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
            'index' => Pages\ListVacantes::route('/'),
            'create' => Pages\CreateVacante::route('/create'),
            'edit' => Pages\EditVacante::route('/{record}/edit'),
        ];
    }    
}
