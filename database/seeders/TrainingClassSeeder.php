<?php

namespace Database\Seeders;

use App\Models\TrainingClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainingClassSeeder extends Seeder
{
    public function run(): void
    {
        //8--12
        // Función para generar una fecha aleatoria de este mes del año
        function generarFechaAleatoria()
        {
            $mesActual = date('m'); // Obtener el mes actual
            $anioActual = date('Y'); // Obtener el año actual
            $diaAleatorio = rand(1, 30); // Día aleatorio (asumiendo febrero con 28 días)
            return "$anioActual-$mesActual-$diaAleatorio";
        }

        // Generar 30 clases de entrenamiento con datos aleatorios y guardarlos en la base de datos
        for ($i = 1; $i <= 50; $i++) {
            $employeeId = rand(8, 12);
            $fecha = generarFechaAleatoria();

            // Generar la hora de inicio aleatoria
            $horaInicio = rand(7, 19); // Entre 7 AM y 7 PM
            $minutoInicio = rand(0, 59);

            // Calcular la hora de fin sumando 2 horas a la hora de inicio
            $horaFin = $horaInicio + 2;
            $minutoFin = rand(0, 59);

            // Generar el tipo_clase_id aleatorio entre 1 y 10
            $tipoClaseId = rand(1, 10);

            // Crear la clase de entrenamiento con los datos aleatorios
            $claseEntrenamiento = [
                'employee_id' => $employeeId,
                'tipo_clase_id' => $tipoClaseId,
                'codigo' => 'EP-' . str_pad($i, 3, '0', STR_PAD_LEFT), // Código único
                'descripcion' => 'Clase de prueba #' . $i,
                'fecha' => $fecha,
                'hora_inicio' => sprintf("%02d:%02d", $horaInicio, $minutoInicio),
                'hora_fin' => sprintf("%02d:%02d", $horaFin, $minutoFin),
                'activo' => 1,
            ];

            // Guardar la clase de entrenamiento en la base de datos
            TrainingClass::create($claseEntrenamiento);
        }

    }
}
