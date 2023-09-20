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
        Schema::create('socios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('membresias_id'); // Cambia el nombre de la columna a 'membresias_id'
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tipo_membresia_id');
            $table->text('descripcion');
            $table->date('fecha_inscripcion')->nullable();
            $table->timestamps();

            // Define the relationship with the membership model
            $table->foreign('membresias_id')->references('id')->on('membresias')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('tipo_membresia_id')->references('id')->on('tipo_de_membresias');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('socios');
    }
};
