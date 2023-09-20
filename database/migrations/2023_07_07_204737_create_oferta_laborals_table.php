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
        Schema::create('oferta_laborals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vacante_id');
            $table->string('titulo');
            $table->string('descripcion');
            $table->string('url_imagen')->nullable();
            $table->timestamps();

            $table->foreign('vacante_id')->references('id')->on('vacantes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oferta_laborals');
    }
};
