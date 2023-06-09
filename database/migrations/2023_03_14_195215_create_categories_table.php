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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('search_name', 2048)->nullable();
            $table->json('name');
            $table->json('meta_title');
            $table->json('meta_tags');
            $table->json('meta_description');
            $table->string('slug');
            $table->integer('order')->nullable()->default(0);
            $table->json('description')->nullable();
            $table->boolean('is_published')->default(true);
            $table->foreignId('parent_id')->nullable()->constrained('categories', 'id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
