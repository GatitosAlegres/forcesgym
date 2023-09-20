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
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asesoramiento_id');
            $table->string('modalidad')->enum(['Diario','Interdiario']);
            $table->string('descripcion');
            
            
            $table->timestamps();

            $table->foreign('asesoramiento_id')->references('id')->on('asesoramientos');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
