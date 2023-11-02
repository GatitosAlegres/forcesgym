<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrainingClassResource\Pages;
use App\Filament\Resources\TrainingClassResource\RelationManagers;
use App\Models\TrainingClass;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Vacancy;
use App\Models\Employee;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;



class TrainingClassResource extends Resource
{
    protected static ?string $model = TrainingClass::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationGroup  = 'Gestion de clases';

    protected static ?string $label = 'Clases de Entrenamiento';

    public static function form(Form $form): Form
    {
                // Obtener los usuarios con los vacancy_id igual a 1
        $users = Employee::where('vacancy_id', 1)->get();

        // Crear un arreglo de opciones con los nombres y los IDs
        $options = $users->pluck('firstname', 'employee_id')->toArray();
        return $form
            ->schema([
                Forms\Components\Select::make('employee_id')
                ->options(
                    \App\Models\Employee::where('vacancy_id', 2)->pluck('firstname', 'id')
                )
                ->label('Entrenador')
                ->required(),
                Forms\Components\Select::make('tipo_clase_id')
                    ->relationship('tipo_clase', 'nombre_tipo_clase')
                    ->required(),
                Forms\Components\TextInput::make('codigo')
                    ->required(),
                Forms\Components\TextInput::make('descripcion')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('fecha')
                    ->required(),
                Forms\Components\TextInput::make('hora_inicio')
                    ->required(),
                Forms\Components\TextInput::make('hora_fin')
                    ->required(),
                Forms\Components\Toggle::make('activo')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('employee.firstname')
                    ->label('Entrenador'),
                Tables\Columns\TextColumn::make('tipo_clase.nombre_tipo_clase')->sortable()->searchable()
                    ->label('Tipo de Clase'),
                Tables\Columns\TextColumn::make('codigo'),
                Tables\Columns\TextColumn::make('descripcion'),
                Tables\Columns\TextColumn::make('fecha')
                    ->date(),
                Tables\Columns\TextColumn::make('hora_inicio'),
                Tables\Columns\TextColumn::make('hora_fin'),
                Tables\Columns\IconColumn::make('activo')
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
                ExportBulkAction::make()
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    protected static function getNavigationBadge(): ?string {
        return static::$model::count();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTrainingClass::route('/'),
            'create' => Pages\CreateTrainingClass::route('/create'),
            'edit' => Pages\EditTrainingClass::route('/{record}/edit'),
        ];
    }
}
