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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('slug');
            $table->text('description');
            $table->string('image')->nullable();
            $table->string('alt')->nullable();
            $table->string('vimeo')->nullable();
            $table->string('youtube')->nullable();
            $table->boolean('share_facebook')->default(true);
            $table->boolean('whatsapp')->default(true);
            $table->string('link')->nullable();
            $table->date('date_published')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
