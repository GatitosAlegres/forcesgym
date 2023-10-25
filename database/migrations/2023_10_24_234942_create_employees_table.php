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
            $table->foreignId('interview_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('vacancy_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->nullable();
            
            $table->unsignedBigInteger('first_journey_id')->nullable();
            $table->unsignedBigInteger('second_journey_id')->nullable();

            $table->foreign('first_journey_id')->references('id')->on('journeys')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('second_journey_id')->references('id')->on('journeys')->onDelete('cascade')->onUpdate('cascade');
            
            $table->foreignId('day_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('gender_id')->constrained()->onDelete('cascade')->onUpdate('cascade');

            $table->string('code')->unique()->max(10);
            $table->string('dni')->unique()->max(8);
            $table->string('firstname')->max(50);
            $table->string('lastname')->max(50);
            $table->string('email')->unique()->max(50);
            $table->string('phone')->max(9)->unique();
            $table->string('address')->max(100);
            $table->string('fotochek_url')->nullable();
            $table->date('date_start');
            $table->date('date_end')->nullable();
            $table->decimal('salary', 8, 2)->default(1025);
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
