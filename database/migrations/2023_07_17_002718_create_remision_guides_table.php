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
        Schema::create('remision_guides', function (Blueprint $table) {
            $table->id();
            $table->string('guia_code');
            $table->string('file_path');
            $table->string("RUC_carrier");
            $table->text("observations")->nullable();
            $table->float("weight", 8, 2);
            $table->date('delivery_date');
            $table->boolean('according')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('remision_guides');
    }
};
