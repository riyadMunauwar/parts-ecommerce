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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('search_name', 2024)->nullable();
            $table->json('meta_title');
            $table->json('meta_tags');
            $table->json('meta_description');
            $table->json('name');
            $table->string('slug', 2048);
            $table->float('regular_price')->nullable();
            $table->float('sale_price');
            $table->string('sku')->nullable();
            $table->integer('stock_qty');
            $table->integer('rating')->nullable();
            $table->integer('total_review')->nullable();
            $table->string('weight_unit')->nullalbe();
            $table->float('weight')->nullable();
            $table->string('dimension_unit')->nullalbe();
            $table->float('length')->nullable();
            $table->float('width')->nullable();
            $table->float('heigth')->nullable();
            $table->json('compatibility')->nullable();
            $table->json('features')->nullable();
            $table->json('description')->nullable();
            $table->string('color')->nullable();
            $table->string('color_code')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(true);
            $table->boolean('is_premium')->default(false);
            $table->foreignId('vat_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
