<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InterviewResource\Pages;
use App\Filament\Resources\InterviewResource\RelationManagers;
use App\Models\Interview;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InterviewResource extends Resource
{
    protected static ?string $model = Interview::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup  = 'Recursos Humanos';

    protected static ?string $label = 'Entrevistas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('evaluation_id')
                    ->options(
                        \App\Models\Evaluation::all()->pluck('code', 'id')
                    )
                    ->required()
                    ->placeholder('Seleccione una evaluación')
                    ->name('Evaluación'),
                Forms\Components\TextInput::make('recruiter')
                    ->required()
                    ->datalist([
                        'Juan Perez García',
                        'Marco Cabrera Sánchez',	
                        'Pedro González López',
                        'Luis Hernández Martínez',
                    ])
                    ->name('Reclutador')
                    ->maxLength(255),
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
                Forms\Components\Toggle::make('state')
                    ->required()
                    ->name('Aprobación'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('evaluation_id'),
                Tables\Columns\TextColumn::make('recruiter'),
                Tables\Columns\TextColumn::make('date')
                    ->date(),
                Tables\Columns\TextColumn::make('time'),
                Tables\Columns\TextColumn::make('link'),
                Tables\Columns\TextColumn::make('comment'),
                Tables\Columns\IconColumn::make('state')
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

    protected static function getNavigationBadge(): ?string {
        return Interview::query()->count();
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInterviews::route('/'),
            'create' => Pages\CreateInterview::route('/create'),
            'edit' => Pages\EditInterview::route('/{record}/edit'),
        ];
    }    
}
