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
        Schema::create('planillas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personal_id');
            $table->unsignedBigInteger('vacante_id');
            $table->date('fecha_emision');
            $table->date('fecha_cierre');
            $table->decimal('total_egresos', 8, 2);
            $table->boolean('estado')->default(true);
            $table->timestamps();

            $table->foreign('personal_id')->references('id')->on('personals');
            $table->foreign('vacante_id')->references('id')->on('vacantes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planillas');
    }
};
