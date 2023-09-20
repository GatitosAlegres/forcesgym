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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->string("number");
            $table->date('issue_date')->default(now());
            $table->string("currency");
            $table->string("status");
            $table->decimal("total_price", 10, 2)->default(0);
            $table->text("notes")->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('guia_remision_id');
            $table->foreign('guia_remision_id')->references('id')->on('guia_remisions')->onDelete('cascade');

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
        Schema::dropIfExists('compras');
    }
};
