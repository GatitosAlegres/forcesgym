<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PayrollResource\Pages;
use App\Filament\Resources\PayrollResource\RelationManagers;
use App\Models\Employee;
use App\Models\Payroll;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class PayrollResource extends Resource
{
    protected static ?string $model = Payroll::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup  = 'Recursos Humanos';

    protected static ?string $label = 'Planillas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Card::make()
                            ->schema(static::getFormSchema())
                            ->columns(2),

                        Forms\Components\Section::make('Planilla detalles')
                            ->schema(static::getFormSchema('payrollDetails')),
                    ])
                    ->columnSpan(['lg' => fn (?Payroll $record) => $record === null ? 3 : 2]),

                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Created at')
                            ->content(fn (Payroll $record): ?string => $record->created_at?->diffForHumans()),
                    ])
                    ->columnSpan(['lg' => 1])
                    ->hidden(fn (?Payroll $record) => $record === null),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('employee.dni')
                    ->label('DNI'),
                Tables\Columns\TextColumn::make('salary')
                    ->label('Salario'),
                Tables\Columns\TextColumn::make('date_start')
                    ->date()
                    ->label('Fecha de inicio'),
                Tables\Columns\TextColumn::make('date_end')
                    ->date()
                    ->label('Fecha de finalizacion'),
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
        return Payroll::query()->count();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPayrolls::route('/'),
            'create' => Pages\CreatePayroll::route('/create'),
            'edit' => Pages\EditPayroll::route('/{record}/edit'),
        ];
    }

    public static function getFormSchema(?string $section = null): array
    {
        if ($section === 'payrollDetails') {
            return [
                Forms\Components\Repeater::make('payrollDetails')
                    ->relationship()
                    ->schema([
                        Forms\Components\Select::make('payroll_id')
                            ->options(
                                \App\Models\Payroll::all()->pluck('id', 'id')
                            )
                            ->required()
                            ->placeholder('Seleccione la planilla')
                            ->name('Planilla Id')
                            ->columnSpan([
                                'md' => 5,
                            ]),
                        Forms\Components\Select::make('payroll_type_id')
                            ->options(
                                \App\Models\PayrollType::all()->pluck('name', 'id')
                            )
                            ->required()
                            ->placeholder('Seleccione tipo de beneficio')
                            ->name('Beneficio Planilla')
                            ->columnSpan([
                                'md' => 5,
                            ]),
                        Forms\Components\TextInput::make('amount')
                            ->required()
                            ->numeric()
                            ->minValue(1)
                            ->name('Monto')
                            ->columnSpan([
                                'md' => 5,
                            ]),
                        Forms\Components\Toggle::make('training')
                            ->required()
                            ->name('Capacitación')
                            ->columnSpan([
                                'md' => 5,
                            ]),
                        Forms\Components\Toggle::make('maternity_leave')
                            ->required()
                            ->name('Permiso por maternidad')
                            ->columnSpan([
                                'md' => 5,
                            ]),
                        Forms\Components\Toggle::make('paternity_leave')
                            ->required()
                            ->name('Permiso por paternidad')
                            ->columnSpan([
                                'md' => 5,
                            ]),
                        Forms\Components\Toggle::make('health_insurance')
                            ->required()
                            ->name('Seguro de salud')
                            ->columnSpan([
                                'md' => 5,
                            ]),
                    ])
                    ->defaultItems(1)
                    ->disableLabel()
                    ->columns([
                        'md' => 10,
                    ])
            ];
        }

        $maxLimit = 3;

        $availableEmployee = \App\Models\Employee::where('payroll', true)
            ->whereNotIn('id', function ($query) use ($maxLimit) {
                $query->select('employee_id')
                    ->from('payrolls')
                    ->groupBy('employee_id')
                    ->havingRaw('COUNT(employee_id) >= ?', [$maxLimit]);
            })
            ->pluck('dni', 'id');

        return [
            Forms\Components\Select::make('employee_id')
                ->options($availableEmployee)
                ->required()
                ->placeholder('Seleccione empleado')
                ->name('Empleado'),
            Forms\Components\TextInput::make('salary')
                ->required()
                ->numeric()
                ->name('Salario')
                ->prefix('S/.'),
            Forms\Components\DatePicker::make('date_start')
                ->required()
                ->name('Fecha de inicio'),
            Forms\Components\DatePicker::make('date_end')
                ->required()
                ->name('Fecha de finalizacion'),
        ];
    }
}
