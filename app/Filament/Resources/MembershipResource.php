<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Membership;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\ColorColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MembershipResource\Pages;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use App\Filament\Resources\MembershipResource\RelationManagers;
use App\Filament\Resources\MembershipResource\Widgets\StatsOverview;


class MembershipResource extends Resource
{
    protected static ?string $model = Membership::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    protected static ?string $navigationGroup  = 'Gestion de clases';

    protected static ?string $label = 'Membresias';

    public static function form(Form $form): Form
    {
        $roleName = 'cliente';
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombreCliente')

                    ->required()
                    ->maxLength(50)
                    ->rules('unique:memberships,nombreCliente', 'unique'),
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
                Tables\Columns\TextColumn::make('nombreCliente')
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
            'index' => Pages\ListMembership::route('/'),
            'create' => Pages\CreateMembership::route('/create'),
            'edit' => Pages\EditMembership::route('/{record}/edit'),
        ];
    }
}
