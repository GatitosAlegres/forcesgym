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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('interview_id')->nullable();
            $table->foreign('interview_id')->references('id')->on('interviews')->onDelete('cascade')->onUpdate('cascade');
            
            $table->unsignedBigInteger('journey_id')->nullable();
            $table->foreign('journey_id')->references('id')->on('journeys')->onDelete('cascade')->onUpdate('cascade');
    
            $table->foreignId('day_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('gender_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('contract_duration_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('vacancy_id')->constrained()->onDelete('cascade')->onUpdate('cascade');

            $table->string('dni')->unique()->max(8);
            $table->string('fullname')->max(120);
            $table->string('email')->unique()->max(50);
            $table->string('phone')->max(9);
            $table->string('address')->max(100);
            $table->boolean('payroll')->default(0)->nullable();
            $table->boolean('fee')->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
