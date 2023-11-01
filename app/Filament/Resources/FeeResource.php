<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FeeResource\Pages;
use App\Filament\Resources\FeeResource\RelationManagers;
use App\Models\Fee;
use App\Models\Payroll;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FeeResource extends Resource
{
    protected static ?string $model = Fee::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup  = 'Recursos Humanos';

    protected static ?string $label = 'Recibo por honorario';

    public static function form(Form $form): Form
    {
        $availibleEmployee = Fee::pluck('employee_id')->toArray();

        $availibleEmployee = \App\Models\Employee::where('fee', true)
            ->whereNotIn('id', Fee::pluck('employee_id')->toArray())
            ->pluck('dni', 'id');

        return $form
            ->schema([
                Forms\Components\Select::make('employee_id')
                    ->options($availibleEmployee)
                    ->required()
                    ->placeholder('Seleccione empleado')
                    ->name('Dni de empleado'),
                Forms\Components\TextInput::make('salary')
                    ->required()
                    ->numeric()
                    ->step(50)
                    ->name('Salario')
                    ->maxValue(1025)
                    ->prefix('S/. '),
                Forms\Components\DatePicker::make('date_start')
                    ->required(),
                Forms\Components\DatePicker::make('date_end')
                    ->required(),
                Forms\Components\Toggle::make('training')
                    ->required()
                    ->name('Capacitación'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('employee.dni')
                    ->label('Dni Empleado'),
                Tables\Columns\TextColumn::make('employee.firstname')
                    ->label('Nombres'),
                Tables\Columns\TextColumn::make('employee.lastname')
                    ->label('Apellidos'),
                Tables\Columns\TextColumn::make('salary')
                    ->label('Salario'),
                Tables\Columns\TextColumn::make('date_start')
                    ->date()
                    ->label('Fecha de inicio'),
                Tables\Columns\TextColumn::make('date_end')
                    ->date()
                    ->label('Fecha de fin'),
                Tables\Columns\IconColumn::make('training')
                    ->boolean()
                    ->label('Capacitación'),
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

    protected static function getNavigationBadge(): ?string
    {
        return Fee::query()->count();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFees::route('/'),
            'create' => Pages\CreateFee::route('/create'),
            'edit' => Pages\EditFee::route('/{record}/edit'),
        ];
    }
}
