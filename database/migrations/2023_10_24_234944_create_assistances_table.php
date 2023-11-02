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
        Schema::create('assistances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clase_entrenamiento_id'); //funciona como codigo de clase
            $table->date('fecha');
            $table->boolean('estado')->default(true); // Campo booleano para el estado
            $table->timestamps();

            $table->foreign('clase_entrenamiento_id')->references('id')->on('training_classes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assistances');
    }
};
