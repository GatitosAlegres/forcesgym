<?php

namespace App\Filament\Resources;

use App\Models\AssistanceDetail;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use App\Filament\Resources\AssistanceDetailResource\Pages;

class AssistanceDetailResource extends Resource
{
    protected static ?string $model = AssistanceDetail::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard';

    protected static ?string $navigationGroup  = 'Gestion de clases';

    protected static ?string $label = 'Asistencia Detalles';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('socio_id')
                    ->relationship('Socio', 'nombreCliente')
                    ->required(),
                Forms\Components\Toggle::make('estado_asistencia')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('socio.nombreCliente')
                    ->label('Cliente'),
                Tables\Columns\IconColumn::make('estado_asistencia')
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

    protected static function getNavigationBadge(): ?string
    {
        return AssistanceDetail::query()->count();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAssistanceDetail::route('/'),
            'create' => Pages\CreateAssistanceDetail::route('/create'),
            'edit' => Pages\EditAssistanceDetail::route('/{record}/edit'),
        ];
    }
}
