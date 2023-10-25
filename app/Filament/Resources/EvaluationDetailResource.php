<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EvaluationDetailResource\Pages;
use App\Filament\Resources\EvaluationDetailResource\RelationManagers;
use App\Models\Candidate;
use App\Models\EvaluationDetail;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\EvaluationType;
use App\Models\Evaluation;

class EvaluationDetailResource extends Resource
{
    protected static ?string $model = EvaluationDetail::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup  = 'Recursos Humanos';

    protected static ?string $label = 'Evaluacion Detalles';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('evaluation_id')
                    ->options(Evaluation::whereNotNull('code')->pluck('code', 'id'))
                    ->required()
                    ->placeholder('Seleccione una evaluación')
                    ->name('Evaluación'),
                Forms\Components\Select::make('evaluation_type_id')
                    ->options(EvaluationType::whereNotNull('name')->pluck('name', 'id'))
                    ->required()
                    ->placeholder('Seleccione tipo de evalaución')
                    ->name('Tipo de evaluación'),
                Forms\Components\DatePicker::make('date')
                    ->required()
                    ->name('Fecha de reunion'),
                Forms\Components\TextInput::make('time')
                    ->required()
                    ->maxLength(255)
                    ->type('time')
                    ->name('Hora de reunion'),
                Forms\Components\TextInput::make('link')
                    ->maxLength(255)
                    ->name('Link de reunion')
                    ->type('url')
                    ->hint('Sólo si la entrevista es virtual*')
                    ->placeholder('https://meet.google.com/...'),
                Forms\Components\TextInput::make('comment')
                    ->maxLength(255)
                    ->name('Comentario'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('evaluation.code')->label('Evaluación'),
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->label('Fecha de reunion'),
                Tables\Columns\TextColumn::make('time')
                    ->label('Hora de reunion'),
                Tables\Columns\TextColumn::make('link')
                    ->label('Link de reunion'),
                Tables\Columns\TextColumn::make('comment')
                    ->label('Comentario'),
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
        return EvaluationDetail::query()->count();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvaluationDetails::route('/'),
            'create' => Pages\CreateEvaluationDetail::route('/create'),
            'edit' => Pages\EditEvaluationDetail::route('/{record}/edit'),
        ];
    }
}
