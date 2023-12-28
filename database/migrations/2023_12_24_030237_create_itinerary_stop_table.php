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
        Schema::create('inerary_sop', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stop_id');
            $table->funsignedBigInteger('itinerary_id');
            $table->timestamps();

            $table->foreign('stop_id')->references('id')->on('stops')->onDelete('cascade');
            $table->foreign('itinerary_id')->references('id')->on('itineraries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itinerary_stop');
    }
};
