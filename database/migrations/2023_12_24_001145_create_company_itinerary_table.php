<?php

// database/migrations/yyyy_mm_dd_create_company_itinerary_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyItineraryTable extends Migration
{
    public function up()
    {
        Schema::create('company_itinerary', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->nsignedBigInteger('itinerary_id');
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('itinerary_id')->references('id')->on('itineraries')->onDelete('cascade');
          });
    }

    public function down()
    {
        Schema::dropIfExists('company_itinerary');
    }
}

