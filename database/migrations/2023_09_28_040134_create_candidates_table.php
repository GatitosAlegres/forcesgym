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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vacancy_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('gender_id')->constrained()->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('journey_id')->nullable();
            
            $table->foreign('journey_id')->references('id')->on('journeys')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('day_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('contract_duration_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->nullable();



            $table->string('dni')->unique()->max(8);
            $table->string('firstname')->max(50);
            $table->string('lastname')->max(50);
            $table->string('email')->unique()->max(50);
            $table->string('phone')->max(9)->unique();
            $table->string('address')->max(100);
            $table->string('curriculum_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
