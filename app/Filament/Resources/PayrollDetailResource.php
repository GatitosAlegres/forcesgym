<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PayrollDetailResource\Pages;
use App\Filament\Resources\PayrollDetailResource\RelationManagers;
use App\Models\PayrollDetail;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PayrollDetailResource extends Resource
{
    protected static ?string $model = PayrollDetail::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup  = 'Recursos Humanos';

    protected static ?string $label = 'Planilla Detalle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('payroll_id')
                    ->required(),
                Forms\Components\Select::make('payroll_type_id')
                    ->options(
                        \App\Models\PayrollType::all()->pluck('name', 'id')
                    )
                    ->required()
                    ->placeholder('Seleccione tipo de beneficio')
                    ->name('Beneficio Planilla'),
                Forms\Components\TextInput::make('amount')
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->name('Monto'),
                Forms\Components\Toggle::make('training')
                    ->required()
                    ->name('Capacitación'),
                Forms\Components\Toggle::make('maternity_leave')
                    ->required()
                    ->name('Permiso por maternidad'),
                Forms\Components\Toggle::make('paternity_leave')
                    ->required()
                    ->name('Permiso por paternidad'),
                Forms\Components\Toggle::make('health_insurance')
                    ->required()
                    ->name('Seguro de salud'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('payroll_id'),
                Tables\Columns\TextColumn::make('payroll_type_id'),
                Tables\Columns\TextColumn::make('amount'),
                Tables\Columns\IconColumn::make('training')
                    ->boolean(),
                Tables\Columns\IconColumn::make('maternity_leave')
                    ->boolean(),
                Tables\Columns\IconColumn::make('paternity_leave')
                    ->boolean(),
                Tables\Columns\IconColumn::make('health_insurance')
                    ->boolean(),
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
        return PayrollDetail::query()->count();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPayrollDetails::route('/'),
            'create' => Pages\CreatePayrollDetail::route('/create'),
            'edit' => Pages\EditPayrollDetail::route('/{record}/edit'),
        ];
    }
}
