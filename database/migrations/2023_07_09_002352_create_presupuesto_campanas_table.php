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
        Schema::create('presupuesto_campanas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campana_publicitaria_id');
            $table->decimal('presupuesto', 8, 2);
            $table->string('observaciones');
            $table->timestamps();

            // Define the relationship with the campana_publicitaria model
            $table->foreign('campana_publicitaria_id')->references('id')->on('campana_publicitarias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presupuesto_campanas');
    }
};
