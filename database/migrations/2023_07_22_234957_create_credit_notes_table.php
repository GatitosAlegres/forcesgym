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
        Schema::create('credit_notes', function (Blueprint $table) {
            $table->id();
            $table->date("issue_date");
            $table->float("total_amount", 8, 2);
            $table->string("currency", 3);
            $table->string("artifact")->nullable();
            $table->text("observations")->nullable();
            $table->timestamps();

            $table->unsignedBigInteger("supplier_id");
            $table->foreign("supplier_id")->references("id")->on("suppliers")->onDelete("cascade");

            $table->unsignedBigInteger("purchase_id");
            $table->foreign("purchase_id")->references("id")->on("purchases")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credit_notes');
    }
};
