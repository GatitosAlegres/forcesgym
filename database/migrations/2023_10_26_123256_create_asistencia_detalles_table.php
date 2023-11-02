<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('asistencia_detalles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clase_entrenamiento_id');
            $table->unsignedBigInteger('socio_id');
            $table->unsignedBigInteger('asistencia_id'); // Agrega esta línea
            $table->boolean('estado_asistencia')->default(false);
            $table->timestamps();

            $table->foreign('socio_id')->references('id')->on('socios')->onDelete('cascade');
            $table->foreign('clase_entrenamiento_id')->references('id')->on('clases_entrenamientos');
            $table->foreign('asistencia_id')->references('id')->on('asistencias')->onDelete('cascade'); // Agrega esta línea
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asistencia_detalles');
    }
};
