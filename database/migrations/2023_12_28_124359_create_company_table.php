<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255); // Ajout de la contrainte de longueur
            $table->string('localisation', 255); // Ajout de la contrainte de longueur
            $table->string('contact', 50); // Ajout de la contrainte de longueur
            $table->enum('status', ['active', 'inactive'])->default('active'); // Utilisation d'une énumération pour le statut
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
