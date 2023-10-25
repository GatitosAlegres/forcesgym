<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EvaluationResource\Pages;
use App\Filament\Resources\EvaluationResource\RelationManagers;
use App\Models\Evaluation;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use App\Models\EvaluationDetail;
use App\Models\EvaluationType;
use App\Models\Compra;

class EvaluationResource extends Resource
{
    protected static ?string $model = Evaluation::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup  = 'Recursos Humanos';

    protected static ?string $label = 'Evaluaciones';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Card::make()
                            ->schema(static::getFormSchema())
                            ->columns(2),

                        Forms\Components\Section::make('Evaluacion detalles')
                            ->schema(static::getFormSchema('evaluationDetails')),
                    ])
                    ->columnSpan(['lg' => fn (?Evaluation $record) => $record === null ? 3 : 2]),

                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Created at')
                            ->content(fn (Evaluation $record): ?string => $record->created_at?->diffForHumans()),
                    ])
                    ->columnSpan(['lg' => 1])
                    ->hidden(fn (?Evaluation $record) => $record === null),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('candidate.dni')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('code')
                    ->label('Código'),
                Tables\Columns\TextColumn::make('recruiter')
                    ->label('Reclutador'),
                Tables\Columns\IconColumn::make('state')
                    ->boolean()
                    ->label('Aprobación'),
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
        return Evaluation::query()->count();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvaluations::route('/'),
            'create' => Pages\CreateEvaluation::route('/create'),
            'edit' => Pages\EditEvaluation::route('/{record}/edit'),
        ];
    }

    public static function getFormSchema(?string $section = null): array
    {
        if ($section === 'evaluationDetails') {
            return [
                Forms\Components\Repeater::make('evaluationDetails')
                    ->relationship()
                    ->schema([
                        Forms\Components\Select::make('evaluation_id')
                            ->options(Evaluation::whereNotNull('code')->pluck('code', 'id'))
                            ->required()
                            ->placeholder('Seleccione una evaluación')
                            ->columnSpan([
                                'md' => 5,
                            ])
                            ->name('Evaluación'),
                        Forms\Components\Select::make('evaluation_type_id')
                            ->options(EvaluationType::whereNotNull('name')->pluck('name', 'id'))
                            ->required()
                            ->placeholder('Seleccione tipo de evalaución')
                            ->columnSpan([
                                'md' => 5,
                            ])
                            ->name('Tipo de evaluación'),
                        Forms\Components\DatePicker::make('date')
                            ->required()
                            ->columnSpan([
                                'md' => 5,
                            ])
                            ->name('Fecha de reunion'),
                        Forms\Components\TextInput::make('time')
                            ->required()
                            ->columnSpan([
                                'md' => 5,
                            ])
                            ->maxLength(255)
                            ->type('time')
                            ->name('Hora de reunion'),
                        Forms\Components\TextInput::make('link')
                            ->maxLength(255)
                            ->columnSpan([
                                'md' => 5,
                            ])
                            ->name('Link de reunion')
                            ->type('url')
                            ->hint('Sólo si la entrevista es virtual*')
                            ->placeholder('https://meet.google.com/...'),
                        Forms\Components\TextInput::make('comment')
                            ->maxLength(255)
                            ->columnSpan([
                                'md' => 5,
                            ])
                            ->name('Comentario'),
                    ])
                    ->defaultItems(1)
                    ->disableLabel()
                    ->columns([
                        'md' => 10,
                    ])
            ];
        }

        return [
            Forms\Components\Select::make('candidate_id')
                ->options(
                    \App\Models\Candidate::all()->pluck('dni', 'id')
                )
                ->required()
                ->placeholder('Seleccione al candidato')
                ->name('Candidato'),
            Forms\Components\TextInput::make('recruiter')
                ->required()
                ->datalist([
                    'Juan Perez García',
                    'Marco Cabrera Sánchez',
                    'Pedro González López',
                    'Luis Hernández Martínez',
                ])
                ->maxLength(255)
                ->name('Reclutador'),
            Forms\Components\Toggle::make('state')
                ->required()
                ->name('Aprobación'),
        ];
    }
}
