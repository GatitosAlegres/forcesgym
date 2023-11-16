<?php

namespace App\Filament\Resources\TrainingClassResource\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;
use App\Models\TrainingClass;
use Carbon\Carbon;

class ClassforDayChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'classforDayChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Clases de entrenamiento registrados / Dia';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        // Obtener todas las clases de entrenamiento
        $clases = TrainingClass::all();

        // Inicializar un arreglo para almacenar el conteo por día de la semana
        $conteoPorDia = [
            'monday' => 0,
            'tuesday' => 0,
            'wednesday' => 0,
            'thursday' => 0,
            'friday' => 0,
            'saturday' => 0,
            'sunday' => 0,
        ];

        // Iterar sobre cada clase de entrenamiento
        foreach ($clases as $clase) {
            // Convertir la fecha a un objeto Carbon especificando el formato
            $fechaCarbon = Carbon::createFromFormat('Y-m-d', $clase->fecha);

            // Obtener el nombre del día de la semana en minúsculas (lunes, martes, ..., domingo)
            $nombreDia = strtolower($fechaCarbon->format('l'));

            // Incrementar el contador correspondiente al día de la semana
            $conteoPorDia[$nombreDia]++;
        }

        // Inicializar un arreglo para almacenar los conteos
        $conteos = [];

        // Iterar sobre los días de la semana y agregar los conteos al arreglo
        foreach ($conteoPorDia as $conteo) {
            $conteos[] = $conteo;
        }

        return [
            'chart' => [
                'type' => 'area',
                'height' => 300,
            ],
            'series' => [
                [
                    'name' => 'Numero de clases',
                    'data' => $conteos,
                ],
            ],
            'xaxis' => [
                'categories' => ['Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab', 'Dom'],
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
            'colors' => ['#f59e0b'],
            'stroke' => [
                'curve' => 'smooth',
            ],
            'dataLabels' => [
                'enabled' => false,
            ],
        ];
    }
}
