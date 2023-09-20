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
        Schema::create('asesoramientos', function (Blueprint $table) {
            $table->id();
            $table->string('especialidad')->enum(['Entrenador','Nutricionista']);  
            $table->string('asesor');  
            $table->string('email');         
            
            $table->timestamps();   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asesoramientos');
    }
};
