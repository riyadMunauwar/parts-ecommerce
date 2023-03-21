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
        Schema::create('feature_boxes', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_published')->default(true);
            $table->json('sup_title', 2048)->nullalbe();
            $table->json('title', 2048)->nullalbe();
            $table->json('sub_title', 2048)->nullalbe();
            $table->json('button_text')->nullalbe();
            $table->string('button_link', 2048)->nullalbe();
            $table->foreignId('category_id')->nullable()->constrained();
            $table->foreignId('product_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feature_boxes');
    }
};
