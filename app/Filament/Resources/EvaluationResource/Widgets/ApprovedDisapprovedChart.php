<?php

namespace App\Filament\Resources\EvaluationResource\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;
use App\Models\Evaluation;

class ApprovedDisapprovedChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'approvedDisapprovedChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Candidatos aprobados y desaprobados';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        $evaluations = Evaluation::all();
        $EvaluationApproved = 0;
        $EvaluationDisapproved = 0;

        foreach ($evaluations as $evaluation) {
            if ($evaluation->state) {
                $EvaluationApproved++;
            } else {
                $EvaluationDisapproved++;
            }
        }

        return [
            'chart' => [
                'type' => 'pie',
                'height' => 300,
            ],
            'series' => [
                $EvaluationApproved,
                $EvaluationDisapproved,
            ],
            'labels' => ['Aprobados', 'Desaprobados'],
            'legend' => [
                'labels' => [
                    'colors' => '#9ca3af',
                    'fontWeight' => 600,
                ],
            ],
        ];
    }
}
