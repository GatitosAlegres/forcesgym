<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Models\Employee;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup  = 'Recursos Humanos';

    protected static ?string $label = 'Empleado';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('interview_id')
                    ->required(),
                Forms\Components\TextInput::make('vacancy_id')
                    ->required(),
                Forms\Components\TextInput::make('first_journey_id'),
                Forms\Components\TextInput::make('second_journey_id'),
                Forms\Components\TextInput::make('day_id')
                    ->required(),
                Forms\Components\TextInput::make('gender_id')
                    ->required(),
                Forms\Components\TextInput::make('code')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('dni')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('firstname')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('lastname')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('address')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('fotochek_url')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('date_start')
                    ->required(),
                Forms\Components\DatePicker::make('date_end'),
                Forms\Components\TextInput::make('salary')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('interview_id'),
                Tables\Columns\TextColumn::make('vacancy_id'),
                Tables\Columns\TextColumn::make('first_journey_id'),
                Tables\Columns\TextColumn::make('second_journey_id'),
                Tables\Columns\TextColumn::make('day_id'),
                Tables\Columns\TextColumn::make('gender_id'),
                Tables\Columns\TextColumn::make('code'),
                Tables\Columns\TextColumn::make('dni'),
                Tables\Columns\TextColumn::make('firstname'),
                Tables\Columns\TextColumn::make('lastname'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('address'),
                Tables\Columns\TextColumn::make('fotochek_url'),
                Tables\Columns\TextColumn::make('date_start')
                    ->date(),
                Tables\Columns\TextColumn::make('date_end')
                    ->date(),
                Tables\Columns\TextColumn::make('salary'),
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
        return Employee::query()->count();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }    
}
