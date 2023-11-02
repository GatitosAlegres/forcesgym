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
        Schema::create('clases_entrenamientos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id')->nullable();//instructor
            $table->unsignedBigInteger('tipo_clase_id'); // Field for tipo_clase ID
            $table->string('codigo');
            $table->string('descripcion');
            $table->date('fecha');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->boolean('activo')->default(true);
            $table->timestamps();

            // Define the relationship with the user model
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade')->onUpdate('cascade');

            // Define the relationship with the tipo_clase model
            $table->foreign('tipo_clase_id')->references('id')->on('tipo_clases')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clases_entrenamientos');
    }
};
