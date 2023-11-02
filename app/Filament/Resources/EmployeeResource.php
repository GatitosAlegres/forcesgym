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
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;


class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationGroup  = 'Recursos Humanos';

    protected static ?string $label = 'Empleado';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('dni')
                    ->required()
                    ->maxLength(8)
                    ->name('Dni'),

                Forms\Components\Select::make('contract_duration_id')
                    ->options(
                        \App\Models\ContractDuration::all()->pluck('name', 'id')
                    )
                    ->required()
                    ->placeholder('Seleccione duración del contrato')
                    ->name('Duracion del contrato'),


                Forms\Components\Select::make('vacancy_id')
                    ->options(
                        \App\Models\Vacancy::all()->pluck('name', 'id')
                    )
                    ->required()
                    ->placeholder('Seleccione área de trabajo')
                    ->name('Vacante'),

                Forms\Components\Select::make('journey_id')
                    ->options(
                        \App\Models\Journey::all()->pluck('name', 'id')
                    )
                    ->required()
                    ->placeholder('Seleccione un tipo de jornada')
                    ->name('Jornada'),

                Forms\Components\Select::make('day_id')
                    ->options(
                        \App\Models\Day::all()->pluck('day', 'id')
                    )
                    ->required()
                    ->placeholder('Seleccione horario de trabajo')
                    ->name('Horario laboral'), 

                Forms\Components\Select::make('gender_id')
                    ->options(
                        \App\Models\Gender::all()->pluck('name', 'id')
                    )
                    ->required()
                    ->placeholder('Seleccione un género')
                    ->name('Género'),

                Forms\Components\TextInput::make('firstname')
                    ->required()
                    ->maxLength(255)
                    ->name('Nombres'),
                Forms\Components\TextInput::make('lastname')
                    ->required()
                    ->maxLength(255)
                    ->name('Apellidos'),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->name('Correo electrónico'),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->prefix('+51')
                    ->required()
                    ->maxLength(9)
                    ->name('Teléfono'),
                Forms\Components\TextInput::make('address')
                    ->required()
                    ->maxLength(255)
                    ->name('Dirección'),
                Forms\Components\Toggle::make('payroll')
                    ->name('Ingresar a planilla'),
                Forms\Components\Toggle::make('fee')
                    ->name('Recibo por honorarios'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\IconColumn::make('payroll')
                    ->boolean()
                    ->label('Registro en planilla'),
                Tables\Columns\IconColumn::make('fee')
                    ->boolean()
                    ->label('Recibo por honorarios'),
                Tables\Columns\TextColumn::make('dni')
                    ->label('Dni'),
                Tables\Columns\TextColumn::make('firstname')
                    ->label('Nombre'),
                Tables\Columns\TextColumn::make('lastname')
                    ->label('Apellidos'),
                Tables\Columns\TextColumn::make('email')
                    ->label('Correo electrónico'),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Teléfono'),
                Tables\Columns\TextColumn::make('address')
                    ->label('Dirección'),
                Tables\Columns\TextColumn::make('vacancy.name')
                    ->label('Vacante'),
                Tables\Columns\TextColumn::make('journey.name')
                    ->label('Jornada'),
                Tables\Columns\TextColumn::make('day.day')
                    ->label('Horario'),
                Tables\Columns\TextColumn::make('gender.name')
                    ->label('Género'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Ingreso'),
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
