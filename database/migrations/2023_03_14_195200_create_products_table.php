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
            $table->json('meta_title');
            $table->json('meta_tags');
            $table->json('meta_description');
            $table->string('search_name', 2048);
            $table->json('name');
            $table->string('slug', 2048);
            $table->decimal('regular_price', 12, 2)->nullable();
            $table->decimal('sale_price', 12, 2);
            $table->string('sku')->nullable();
            $table->integer('stock_qty');
            $table->integer('rating')->nullable();
            $table->integer('total_review')->nullable();
            $table->string('weight_unit')->default('g')->nullalbe();
            $table->decimal('weight', 12, 2)->nullable();
            $table->string('dimension_unit')->default('cm')->nullalbe();
            $table->decimal('length', 12, 2)->nullable();
            $table->decimal('width', 12, 2)->nullable();
            $table->decimal('height', 12, 2)->nullable();
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
