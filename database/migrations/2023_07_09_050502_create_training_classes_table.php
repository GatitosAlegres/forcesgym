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
        Schema::create('training_classes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); //instructor
            $table->unsignedBigInteger('tipo_clase_id'); // Field for tipo_clase ID
            $table->string('codigo');
            $table->string('descripcion');
            $table->date('fecha');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->boolean('activo')->default(true);
            $table->timestamps();

            // Define the relationship with the user model
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Define the relationship with the tipo_clase model
            $table->foreign('tipo_clase_id')->references('id')->on('class_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_classes');
    }
};
