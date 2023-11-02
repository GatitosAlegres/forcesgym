<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClassTypeResource\Pages;
use App\Models\ClassType;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class ClassTypeResource extends Resource
{
    protected static ?string $model = ClassType::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup  = 'Gestion de clases';

    protected static ?string $label = 'Tipo de clases';

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
                ExportBulkAction::make()
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    protected static function getNavigationBadge(): ?string
    {
        return ClassType::query()->count();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClassType::route('/'),
            'create' => Pages\CreateClassType::route('/create'),
            'edit' => Pages\EditClassType::route('/{record}/edit'),
        ];
    }
}
