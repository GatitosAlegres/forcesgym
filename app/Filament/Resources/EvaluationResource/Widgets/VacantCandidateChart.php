<?php

namespace App\Filament\Resources\EvaluationResource\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;
use App\Models\Candidate;
use App\Models\Vacancy;

class VacantCandidateChart extends ApexChartWidget
{
    protected static string $chartId = 'vacantCandidateChart';

    protected static ?string $heading = 'Vacante vs Candidato';

    protected static ?int $sort = 5;

    protected function getOptions(): array
    {
        // Inicializar un arreglo para almacenar los resultados
        $candidates = Candidate::all();
        $vacancies = Vacancy::all();
        $dataCandidates = [];

        foreach ($vacancies as $vacancy) {
            $candidatesForVacancy = $candidates->where('vacancy_id', $vacancy->id);
            $dataCandidates[$vacancy->id] = $candidatesForVacancy->count();
        }

        $dataVacancies = Vacancy::pluck('name')->toArray();

        return [
            'chart' => [
                'type' => 'bar',
                'height' => 300,
            ],
            'series' => [
                [
                    'name' => 'Candidato',
                    'data' => array_values($dataCandidates),
                ],
            ],
            'xaxis' => [
                'categories' => $dataVacancies,
                'labels' => [
                    'style' => [
                        'colors' => '#9ca3af',
                        'fontWeight' => 600,
                    ],
                ],
            ],
            'yaxis' => [
                'labels' => [
                    'style' => [
                        'colors' => '#9ca3af',
                        'fontWeight' => 600,
                    ],
                ],
            ],
            'colors' => ['#6366f1'],
            'plotOptions' => [
                'bar' => [
                    'borderRadius' => 3,
                    'horizontal' => true,
                ],
            ],
        ];
    }
}
