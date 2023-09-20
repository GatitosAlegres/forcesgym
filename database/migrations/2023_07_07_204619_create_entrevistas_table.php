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
        Schema::create('entrevistas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vacante_id');
            $table->unsignedBigInteger('curriculum_id');
            $table->string('link')->nullable();
            $table->date('fecha');
            $table->string('comentario')->nullable();
            $table->timestamps();

            $table->foreign('vacante_id')->references('id')->on('vacantes');
            $table->foreign('curriculum_id')->references('id')->on('curricula');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrevistas');
    }
};
