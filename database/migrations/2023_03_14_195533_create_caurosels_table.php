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
        Schema::create('caurosels', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_published')->default(true);
            $table->string('image_link', 2048)->nullable();
            $table->json('title')->nullable();
            $table->json('subtitle')->nullable();
            $table->json('text')->nullable();
            $table->json('button_one_text')->nullable();
            $table->json('button_two_text')->nullable();
            $table->string('button_one_link', 2048)->nullable();
            $table->string('button_two_link', 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caurosels');
    }
};
