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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('tipo_cliente')->enum(['Juridico','Natural']);
            $table->string('nombre');
            $table->string('dni_ruc')->unique();
            $table->string('email')->unique();
            $table->string('telefono')->unique();
            $table->decimal('peso',6,3);
            $table->string('sexo')->enum(['Femenino','Masculino']);
            $table->string('url_imagen')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
