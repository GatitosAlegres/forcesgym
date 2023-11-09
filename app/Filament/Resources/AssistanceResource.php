<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Assistance;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\AssistanceResource\Pages;

use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AssistanceResource\RelationManagers;
use App\Filament\Resources\AssistanceResource\RelationManagers\AssistanceDetailRelationManager;
use App\Models\AssistanceDetail;
use App\Models\Partner;

class AssistanceResource extends Resource
{
    protected static ?string $model = Assistance::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard';

    protected static ?string $navigationGroup  = 'Gestion de clases';

    protected static ?string $label = 'Asistencia';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Card::make()
                            ->schema(static::getFormSchema())
                            ->columns(2),

                        Forms\Components\Section::make('Asistencia Detalles')
                            ->schema(static::getFormSchema('detalles')),
                    ])
                    ->columnSpan(['lg' => fn (?Assistance $record) => $record === null ? 3 : 2]),

                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Placeholder::make('clase_entrenamineto_id')
                            ->label('Codigo de Clase')
                            ->content(fn (Assistance $record): ?string => $record->clase_entrenamiento?->codigo),
                        Forms\Components\Placeholder::make('fecha')
                            ->label('Fecha')
                            ->content(fn (Assistance $record): ?string => $record->fecha),
                        Forms\Components\Placeholder::make('estado')
                            ->label('Estado')
                            ->content(fn (Assistance $record): ?string => $record->estado ? 'Activo' : 'Inactivo'),
                    ])
                    ->columnSpan(['lg' => 1])
                    ->hidden(fn (?Assistance $record) => $record === null),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('clase_entrenamiento.codigo')
                    ->label('Codigo de Clase'),
                Tables\Columns\TextColumn::make('fecha')
                    ->date(),
                Tables\Columns\IconColumn::make('estado')
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
            AssistanceDetailRelationManager::class,
        ];
    }

    protected static function getNavigationBadge(): ?string
    {
        return Assistance::query()->count();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAssistance::route('/'),
            'create' => Pages\CreateAssistance::route('/create'),
            'edit' => Pages\EditAssistance::route('/{record}/edit'),
        ];
    }

    public static function getFormSchema(?string $section = null): array
    {
        if ($section === 'detalles') {
            return [
                Forms\Components\Repeater::make('detalles')
                    ->relationship()
                    ->schema([


                        Forms\Components\Select::make('socio_id')
                            ->options(Partner::whereNotNull('nombreCliente')->pluck('nombreCliente', 'id'))
                            ->required()
                            ->placeholder('Seleccione una evaluación')
                            ->name('Socio')
                            ->columnSpan([
                                'md' => 5,
                            ]),

                        //ahora para el estado de la asistencia
                        Forms\Components\Toggle::make('estado')
                            ->required()
                            ->name('Aprobación'),

                    ])
                    ->defaultItems(1)
                    ->disableLabel()
                    ->columns([
                        'md' => 10,
                    ])
                    ->required(),
            ];
        }

        return [
            Forms\Components\Select::make('clase_entrenamiento_id')
                ->options(\App\Models\TrainingClass::all()->pluck('codigo', 'id'))
                ->required()
                ->label('Clase de entrenamiento'),
            Forms\Components\DatePicker::make('fecha')
                ->default(now())
                ->required()
                ->label('Fecha'),
            Forms\Components\Select::make('estado')
                ->options([
                    '1' => 'Activo',
                    '0' => 'Inactivo',
                ])
                ->required()
                ->label('Estado'),
        ];
    }
}
