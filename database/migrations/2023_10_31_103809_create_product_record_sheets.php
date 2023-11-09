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
        Schema::create('product_record_sheets', function (Blueprint $table) {
            $table->id();
            $table->string('code_item');
            $table->unsignedBigInteger('product_id');
            $table->longText('description')->nullable();
            $table->string('category');
            $table->decimal('base_price', 10, 2);
            $table->integer('minimum_replacement_stock');
            $table->string('unit_of_measurement');
            $table->integer('replacement_quantity');
            $table->timestamps('');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_record_sheets');
    }
};
