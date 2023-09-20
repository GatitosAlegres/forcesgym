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
        Schema::create('membresias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Field for user ID
            $table->unsignedBigInteger('tipo_membresia_id'); // Field for tipo_membresia ID
            $table->text('descripcion');
            $table->decimal('precio', 8, 2);
            $table->boolean('activo')->default(true);
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->timestamps();

            // Define the relationship with the user model
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Define the relationship with the membership_types model
            $table->foreign('tipo_membresia_id')->references('id')->on('tipo_de_membresias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membresias');
    }
};
