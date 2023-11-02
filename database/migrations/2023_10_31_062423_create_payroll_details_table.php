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
        Schema::create('payroll_details', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('payroll_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('payroll_type_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('amount', 8, 2);
            $table->boolean('training');
            $table->boolean('maternity_leave')->default(0);
            $table->boolean('paternity_leave')->default(0);
            $table->boolean('health_insurance');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payroll_details');
    }
};
