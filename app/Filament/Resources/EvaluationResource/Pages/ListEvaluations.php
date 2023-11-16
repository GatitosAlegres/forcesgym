<?php

namespace App\Filament\Resources\EvaluationResource\Pages;

use App\Filament\Resources\EvaluationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEvaluations extends ListRecords
{
    protected static string $resource = EvaluationResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),

            Actions\ActionGroup::make([
                Actions\Action::make('Reporte Gráfico')
                    ->icon('heroicon-s-chart-bar')
                    ->url(EvaluationResource::getUrl('report')),
            ]),
        ];
    }

    
    protected function getHeaderWidgets(): array
    {
        return EvaluationResource::getWidgets();
    }
}
