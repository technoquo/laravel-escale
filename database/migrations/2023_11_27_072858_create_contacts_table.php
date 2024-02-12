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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('nom_contact')->nullable();
            $table->text('description_contact')->nullable();
            $table->string('acces_bus1')->nullable();
            $table->string('acces_bus2')->nullable();
            $table->string('acces_tram1')->nullable();
            $table->string('acces_tram2')->nullable();
            $table->string('bureau')->nullable();
            $table->string('tel')->nullable();
            $table->string('gsm')->nullable();
            $table->string('email')->nullable();
            $table->string('googlemap')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('horaire')->nullable();
            $table->text('don')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
