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
        Schema::create('carnets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('registro_socio_id');
            $table->unsignedBigInteger('horario_id');
            $table->unsignedBigInteger('cliente_id');
            $table->date('fecha_emision');
            $table->string('Comentario');
            $table->timestamps();

            $table->foreign('registro_socio_id')->references('id')->on('registro_socios');
            $table->foreign('horario_id')->references('id')->on('horarios');
            $table->foreign('cliente_id')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carnets');

    }
};
