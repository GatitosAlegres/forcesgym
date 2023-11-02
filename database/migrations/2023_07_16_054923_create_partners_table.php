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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('membresias_id')->nullable(); // Cambia el nombre de la columna a 'membresias_id'
            $table->string('nombreCliente')->unique();
            $table->unsignedBigInteger('tipo_membresia_id');
            $table->text('descripcion');
            $table->date('fecha_inscripcion')->nullable();
            $table->timestamps();

            // Define the relationship with the membership model
            $table->foreign('membresias_id')->references('id')->on('memberships')->onDelete('cascade');
            $table->foreign('tipo_membresia_id')->references('id')->on('membership_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
