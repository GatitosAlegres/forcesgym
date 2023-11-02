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
        Schema::create('budget_campaigns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('budget_campaign_id');
            $table->decimal('presupuesto', 8, 2);
            $table->string('observaciones');
            $table->timestamps();

            // Define the relationship with the campana_publicitaria model
            $table->foreign('budget_campaign_id')->references('id')->on('ad_campaigns')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budget_campaigns');
    }
};
