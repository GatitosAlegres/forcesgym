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
        Schema::create('evaluacions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_evaluacion_id');
            $table->unsignedBigInteger('entrevista_id');
            $table->string('reclutador');
            $table->boolean('estado')->default(true);         
            $table->string('comentario')->nullable();
            $table->date('fecha');
            $table->timestamps();

            $table->foreign('tipo_evaluacion_id')->references('id')->on('tipo_evaluacions');
            $table->foreign('entrevista_id')->references('id')->on('entrevistas');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluacions');
    }
};
