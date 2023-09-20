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
        Schema::create('registro_socios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('promocion_id');
            $table->unsignedBigInteger('cliente_id');
            $table->string('tipo_de_doc')->enum(['Boleta','Factura']);
            $table->decimal('precio_total',5,2);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->boolean('pagado')->default(false);
            $table->timestamps();

            
            $table->foreign('promocion_id')->references('id')->on('promotions');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_socios');
    }
};
