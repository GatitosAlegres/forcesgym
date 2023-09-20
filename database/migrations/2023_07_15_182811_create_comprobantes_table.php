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
        Schema::create('comprobantes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('registro_socio_id');
            $table->string("numero");
            $table->decimal('descuento',5,2);
            $table->decimal('total',5,2);
            $table->timestamps();
            
            $table->foreign('registro_socio_id')->references('id')->on('registro_socios'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comprobantes');
    }
};
