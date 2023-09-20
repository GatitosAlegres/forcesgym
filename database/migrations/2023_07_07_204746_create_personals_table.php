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
        Schema::create('personals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('resultado_id');
            $table->unsignedBigInteger('tipo_pago_id');
            $table->unsignedBigInteger('area_id');
            $table->decimal('salario', 8, 2);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->timestamps();

            $table->foreign('resultado_id')->references('id')->on('resultados');
            $table->foreign('tipo_pago_id')->references('id')->on('tipo_pagos');
            $table->foreign('area_id')->references('id')->on('vacantes');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personals');
    }
};
