<?php

namespace App\Filament\Resources\TrainingClassResource\Pages;

use Filament\Resources\Pages\Page;
use App\Filament\Resources\TrainingClassResource;
use App\Filament\Resources\TrainingClassResource\Widgets\TotallClassChart;
use App\Filament\Resources\TrainingClassResource\Widgets\StatsOverview;
use App\Filament\Resources\TrainingClassResource\Widgets\ClassforDayChart;
use App\Filament\Resources\TrainingClassResource\Widgets\CountTypeOfClassChart;
use App\Filament\Resources\TrainingClassResource\Widgets\EntranceKPIChart;

class ReportTrainingClass extends Page
{
    protected static string $resource = TrainingClassResource::class;

    protected static string $view = 'filament.resources.training-class-resource.pages.report-training-class';

    protected static ?string $title = 'Reporte de Clases de entrenamiento';

    protected function getHeaderWidgets(): array
    {
        return [
            StatsOverview::class,
            TotallClassChart::class,
            ClassforDayChart::class,
            CountTypeOfClassChart::class,
            EntranceKPIChart::class,
        ];
    }
}
