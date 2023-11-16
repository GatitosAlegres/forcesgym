<?php

namespace App\Filament\Resources\EvaluationResource\Pages;

use App\Filament\Resources\EvaluationResource;
use Filament\Resources\Pages\Page;
use App\Filament\Resources\EvaluationResource\Widgets\VacantCandidateChart;
use App\Filament\Resources\EvaluationResource\Widgets\StatsOverview;
use App\Filament\Resources\EvaluationResource\Widgets\ApprovedDisapprovedChart;

class ReportEvaluation extends Page
{
    protected static string $resource = EvaluationResource::class;

    protected static string $view = 'filament.resources.evaluation-resource.pages.report-evaluation';

    protected static ?string $title = 'Reporte de evaluaciones';

    protected function getHeaderWidgets(): array
    {
        return [        
            StatsOverview::class,
            VacantCandidateChart::class,
            ApprovedDisapprovedChart::class,
        ];
    }
}
