<?php

namespace App\Filament\Resources\EvaluationResource\Widgets;

use App\Models\Candidate;
use App\Models\Vacancy;
use App\Models\Evaluation;

use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{

    protected static ?int $sort = 2;

    protected function getCards(): array
    {
        return [
            Card::make(
                'Candidatos',
                Candidate::count()
            )
                ->description('Candidates registrados en la base de datos')
                ->descriptionIcon('heroicon-o-shopping-cart')
                ->color('success')
                ->chart(
                    Candidate::pluck('dni')->toArray(),
                ),

            Card::make(
                'Vacantes',
                Vacancy::count()
            )
                ->description('Vacantes registrados en la base de datos')
                ->descriptionIcon('heroicon-o-user-group')
                ->color('success'),

            Card::make(
                    'Evaluaciones',
                    Evaluation::count()
                )
                    ->description('Evaluaciones registrados en la base de datos')
                    ->descriptionIcon('heroicon-o-user-group')
                    ->color('success'),

            Card::make(
                    'Candidatos aprobados',
                    Evaluation::where('state', true)->count()
                )
                    ->description('Candidatos aprobados en evaluaciones')
                    ->descriptionIcon('heroicon-o-user-group')
                    ->color('success'),
        ];
    }
}
