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
        Schema::create('kardexs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_record_sheet_id');
            $table->string('code_item')->nullable();
            $table->timestamp('movement_date')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('responsible_id')->nullable();
            $table->string('brand')->nullable();
            $table->decimal('unit_price', 10, 2)->nullable();
            $table->decimal('total_price', 10, 2)->nullable();
            $table->integer('previous_stock')->nullable();
            $table->string('type_movement')->nullable();
            $table->integer('input_quantity')->nullable();
            $table->integer('output_quantity')->nullable();
            $table->integer('current_stock')->nullable();            
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('responsible_id')->references('id')->on('users');
            $table->foreign('product_record_sheet_id')->references('id')->on('product_record_sheets');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kardexs');
    }
};
