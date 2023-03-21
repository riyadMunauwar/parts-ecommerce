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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('primary_color')->nullable();
            $table->string('secondary_color')->nullable();
            $table->string('primary_text')->nullable();
            $table->string('secondary_text')->nullable();
            $table->boolean('is_top_header_active')->default(true);
            $table->string('top_header_text', 2048)->nullable();
            $table->string('top_header_button_text')->nullable();
            $table->string('top_header_button_link', 2048)->nullable();
            $table->boolean('is_shipping_banner_active')->default(true);
            $table->string('shipping_banner_text', 2048)->nullable();
            $table->string('shipping_banner_button_text')->nullable();
            $table->string('shipping_banner_button_link', 2048)->nullable();
            $table->boolean('is_caurosel_active')->default(true);
            $table->boolean('is_image_banner_active')->default(true);
            $table->boolean('is_feature_box_active')->default(true);
            $table->boolean('is_footer_active')->default(true);
            $table->boolean('is_menu_active')->default(true);
            $table->boolean('is_selling_feature_banner_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
