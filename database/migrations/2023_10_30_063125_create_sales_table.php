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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            //$table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cliente_id');
            $table->decimal('amount', 10, 2)->nullable();
            $table->timestamps();
            //$table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('cliente_id')->references('id')->on('clientes')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
