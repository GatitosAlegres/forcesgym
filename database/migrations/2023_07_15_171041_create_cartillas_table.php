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
        Schema::create('cartillas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('asesoramiento_id');
            $table->unsignedBigInteger('cliente_id');
            $table->text("descripcion");
            $table->timestamps();

            $table->foreign('asesoramiento_id')->references('id')->on('asesoramientos');
            $table->foreign('cliente_id')->references('id')->on('clientes'); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cartillas');
    }
};
