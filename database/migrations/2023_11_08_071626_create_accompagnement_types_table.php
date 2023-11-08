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
        Schema::create('accompagnement_types', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('slug');
            $table->string('image');
            $table->string('name_type_1')->nullable();
            $table->string('description_roi')->nullable();
            $table->string('attachment_roi')->nullable();
            $table->string('name_type_2')->nullable();
            $table->string('description_convention')->nullable();
            $table->string('attachment_convention')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accompagnement_types');
    }
};
