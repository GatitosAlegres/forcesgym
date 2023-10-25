<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CandidateResource\Pages;
use App\Filament\Resources\CandidateResource\RelationManagers;
use App\Models\Candidate;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Vacancy;

class CandidateResource extends Resource
{
    protected static ?string $model = Candidate::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup  = 'Recursos Humanos';

    protected static ?string $label = 'Candidatos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('vacancy_id')
                    ->options(
                        \App\Models\Vacancy::all()->pluck('name', 'id')
                    )
                    ->required()
                    ->placeholder('Seleccione una vacante')
                    ->name('Vacante'),
                Forms\Components\Select::make('gender_id')
                    ->options(
                        \App\Models\Gender::all()->pluck('name', 'id')
                    )
                    ->required()
                    ->placeholder('Seleccione un género')
                    ->name('Género'),
                Forms\Components\TextInput::make('dni')
                    ->required()
                    ->maxLength(255),
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
                    ->name('Correo'),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->prefix('+51')
                    ->required()
                    ->maxLength(255)
                    ->name('Teléfono'),
                Forms\Components\TextInput::make('address')
                    ->required()
                    ->maxLength(255)
                    ->name('Dirección'),
                Forms\Components\FileUpload::make('curriculum_url')
                    ->required()
                    ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.ms-excel', 'image/*'])
                    ->name('Curriculum'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('vacancy.name')->label('Vacante'),
                Tables\Columns\TextColumn::make('dni')->label('DNI'),
                Tables\Columns\TextColumn::make('gender.name')->label('Género'),
                Tables\Columns\TextColumn::make('firstname')->label('Nombres'),
                Tables\Columns\TextColumn::make('lastname')->label('Apellidos'),
                Tables\Columns\TextColumn::make('email')->label('Correo'),
                Tables\Columns\TextColumn::make('phone')->label('Teléfono'),
                Tables\Columns\TextColumn::make('address')->label('Dirección'),
                Tables\Columns\TextColumn::make('curriculum_url')->label('Curriculum'),
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
        return Candidate::query()->count();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCandidates::route('/'),
            'create' => Pages\CreateCandidate::route('/create'),
            'edit' => Pages\EditCandidate::route('/{record}/edit'),
        ];
    }    
}
