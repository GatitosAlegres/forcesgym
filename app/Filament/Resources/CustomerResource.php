<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Models\Customer;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup  = 'Ventas';

    protected static ?string $label = 'Clientes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->maxLength(50)
                    ->required()
                    ->label('Nombre/Razón Social'),
                Forms\Components\TextInput::make('dni')
                    ->maxLength(11)
                    ->required()
                    ->label('DNI/RUC'),
                Forms\Components\TextInput::make('email')
                    ->maxLength(30)
                    ->required(),
                Forms\Components\TextInput::make('telefono')
                    ->maxLength(9)
                    ->required(),
                Forms\Components\TextInput::make('direccion')
                    ->maxLength(50)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([


                Tables\Columns\TextColumn::make('nombre')
                ->searchable()
                ->label('Cliente'),
                Tables\Columns\TextColumn::make('dni')
                ->searchable()
                ->label('DNI'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('telefono'),
                Tables\Columns\TextColumn::make('direccion'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::query()->count();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomer::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
