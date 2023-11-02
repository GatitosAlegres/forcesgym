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
        Schema::create('assistance_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clase_entrenamiento_id');
            $table->unsignedBigInteger('socio_id');
            $table->unsignedBigInteger('assistance_id'); // Agrega esta línea
            $table->boolean('estado_asistencia')->default(false);
            $table->timestamps();

            $table->foreign('socio_id')->references('id')->on('partners')->onDelete('cascade');
            $table->foreign('clase_entrenamiento_id')->references('id')->on('training_classes');
            $table->foreign('assistance_id')->references('id')->on('assistances')->onDelete('cascade'); // Agrega esta línea
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assistance_details');
    }
};
