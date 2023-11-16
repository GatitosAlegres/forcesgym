<?php

namespace App\Filament\Resources\TrainingClassResource\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;
use App\Models\ClassType;
use App\Models\TrainingClass;
use Illuminate\Support\Facades\DB;


class CountTypeOfClassChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static string $chartId = 'countTypeOfClassChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Clases de entrenamiento registrados / Tipo';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {


        // Obtener todos los nombres únicos de tipos de clases
        $uniqueClassTypeNames = TrainingClass::distinct('tipo_clase_id')
            ->pluck('tipo_clase_id');

        // Obtener los nombres de los tipos de clases a partir de los IDs
        $classTypeNames = ClassType::whereIn('id', $uniqueClassTypeNames)
            ->pluck('nombre_tipo_clase');

        // Convertir la colección a un array
        $categories = $classTypeNames->toArray();


        // Obtener el conteo de clases por nombre de tipo de clase
        $classTypeCounts = TrainingClass::select('tipo_clase_id', DB::raw('count(*) as count'))
            ->groupBy('tipo_clase_id')
            ->get();

        // Inicializar un array para almacenar el conteo por nombre
        $countByTypeName = [];

        // Iterar sobre los resultados y almacenar el conteo por nombre
        foreach ($classTypeCounts as $count) {
            $typeName = ClassType::find($count->tipo_clase_id)->nombre_tipo_clase;
            $countByTypeName[$typeName] = $count->count;
        }

        return [
            'chart' => [
                'type' => 'bar',
                'height' => 300,
            ],
            'series' => [
                [
                    'name' => 'BasicBarChart',
                    'data' => array_values($countByTypeName),
                ],
            ],
            'xaxis' => [
                'categories' => $categories,
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
            'plotOptions' => [
                'bar' => [
                    'borderRadius' => 3,
                    'horizontal' => true,
                ],
            ],
        ];
    }
}
