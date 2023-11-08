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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string("number");
            $table->date('issue_date')->default(now());
            $table->string("currency");
            $table->string("status");
            $table->decimal("total_price", 10, 2)->default(0);
            $table->text("notes")->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('suppliers');

            $table->unsignedBigInteger('remision_guide_id');
            $table->foreign('remision_guide_id')->references('id')->on('remision_guides')->onDelete('cascade');

            $table->unsignedBigInteger('invoice_id');
            $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade');

            $table->unsignedBigInteger("warranty_id");
            $table->foreign("warranty_id")->references("id")->on("warranties")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
