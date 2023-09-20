<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClasesEntrenamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $c1 = \App\Models\ClasesEntrenamiento::create([
            'user_id' => '22',
            'tipo_clase_id' => '4',
            'codigo' => 'LC01',
            'descripcion' => 'Clase de prueba',
            'fecha' => '2023-07-23',
            'hora_inicio' => '08:00:00',
            'hora_fin' => '10:00:00',
            'activo' => '1',
        ]);

        $c2 = \App\Models\ClasesEntrenamiento::create([
            'user_id' => '23',
            'tipo_clase_id' => '9',
            'codigo' => 'AR01',
            'descripcion' => 'Clase de prueba',
            'fecha' => '2023-07-23',
            'hora_inicio' => '10:00:00',
            'hora_fin' => '12:00:00',
            'activo' => '1',
        ]);

        $c3 = \App\Models\ClasesEntrenamiento::create([
            'user_id' => '23',
            'tipo_clase_id' => '2',
            'codigo' => 'AR02',
            'descripcion' => 'Clase de prueba',
            'fecha' => '2023-07-24',
            'hora_inicio' => '12:00:00',
            'hora_fin' => '14:00:00',
            'activo' => '1',
        ]);

        $c4 = \App\Models\ClasesEntrenamiento::create([
            'user_id' => '21',
            'tipo_clase_id' => '6',
            'codigo' => 'MG01',
            'descripcion' => 'Clase de prueba',
            'fecha' => '2023-07-24',
            'hora_inicio' => '14:00:00',
            'hora_fin' => '16:00:00',
            'activo' => '1',
        ]);

        $c5 = \App\Models\ClasesEntrenamiento::create([
            'user_id' => '21',
            'tipo_clase_id' => '7',
            'codigo' => 'MG02',
            'descripcion' => 'Clase de prueba',
            'fecha' => '2023-07-25',
            'hora_inicio' => '16:00:00',
            'hora_fin' => '18:00:00',
            'activo' => '1',
        ]);

        $c6 = \App\Models\ClasesEntrenamiento::create([
            'user_id' => '20',
            'tipo_clase_id' => '8',
            'codigo' => 'LC02',
            'descripcion' => 'Clase de prueba',
            'fecha' => '2023-07-26',
            'hora_inicio' => '18:00:00',
            'hora_fin' => '20:00:00',
            'activo' => '1',
        ]);

        $c7 = \App\Models\ClasesEntrenamiento::create([
            'user_id' => '20',
            'tipo_clase_id' => '1',
            'codigo' => 'LC03',
            'descripcion' => 'Clase de prueba',
            'fecha' => '2023-07-24',
            'hora_inicio' => '20:00:00',
            'hora_fin' => '22:00:00',
            'activo' => '1',
        ]);

        $c8 = \App\Models\ClasesEntrenamiento::create([
            'user_id' => '19',
            'tipo_clase_id' => '3',
            'codigo' => 'AR03',
            'descripcion' => 'Clase de prueba',
            'fecha' => '2023-07-27',
            'hora_inicio' => '22:00:00',
            'hora_fin' => '00:00:00',
            'activo' => '1',
        ]);

        $c9 = \App\Models\ClasesEntrenamiento::create([
            'user_id' => '19',
            'tipo_clase_id' => '5',
            'codigo' => 'AR04',
            'descripcion' => 'Clase de prueba',
            'fecha' => '2023-07-21',
            'hora_inicio' => '00:00:00',
            'hora_fin' => '02:00:00',
            'activo' => '1',
        ]);

        $c10 = \App\Models\ClasesEntrenamiento::create([
            'user_id' => '18',
            'tipo_clase_id' => '10',
            'codigo' => 'MG03',
            'descripcion' => 'Clase de prueba',
            'fecha' => '2023-07-19',
            'hora_inicio' => '02:00:00',
            'hora_fin' => '04:00:00',
            'activo' => '1',
        ]);

        $c11 = \App\Models\ClasesEntrenamiento::create([
            'user_id' => '18',
            'tipo_clase_id' => '3',
            'codigo' => 'MG04',
            'descripcion' => 'Clase de prueba',
            'fecha' => '2023-07-05',
            'hora_inicio' => '04:00:00',
            'hora_fin' => '06:00:00',
            'activo' => '1',
        ]);

        $c12 = \App\Models\ClasesEntrenamiento::create([
            'user_id' => '17',
            'tipo_clase_id' => '9',
            'codigo' => 'LC04',
            'descripcion' => 'Clase de prueba',
            'fecha' => '2023-07-15',
            'hora_inicio' => '06:00:00',
            'hora_fin' => '08:00:00',
            'activo' => '1',
        ]);
    }
}
