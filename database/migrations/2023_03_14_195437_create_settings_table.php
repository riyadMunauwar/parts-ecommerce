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

            $table->string('primary_color', 32)->default('#111827')->nullable();
            $table->string('secondary_color', 32)->default('#374151')->nullable();

            $table->string('primary_text_color', 32)->default('#fff')->nullable();
            $table->string('secondary_text_color', 32)->default('#fff')->nullable();

            $table->string('top_header_bg_color', 32)->default('#000')->nullable();
            $table->string('top_header_text_color', 32)->default('#fff')->nullable();

            $table->string('main_header_bg_color', 32)->default('#000')->nullable();
            $table->string('main_header_text_color', 32)->default('#fff')->nullable();

            $table->string('middle_header_bg_color', 32)->default('#fff')->nullable();
            $table->string('middle_header_text_color', 32)->default('#000')->nullable();

            $table->string('footer_bg_color', 32)->default('#cbd5e1')->nullable();
            $table->string('footer_text_color', 32)->default('#1f2937')->nullable();

            $table->json('top_header_message_text')->nullable();
            $table->json('top_header_button_text')->nullable();
            $table->string('top_header_button_link', 2048)->nullable();
            $table->string('top_header_button_text_color', 32)->default('#ea580c')->nullable();

            $table->json('main_header_message_text')->nullable();
            $table->string('main_header_message_text_link', 2048)->nullable();

            $table->json('middle_header_message_text')->nullable();
            $table->string('middle_header_message_text_link')->nullable();

            $table->boolean('is_top_header_active')->default(true);
            $table->boolean('is_caurosel_active')->default(true);
            $table->boolean('is_image_banner_active')->default(true);
            $table->boolean('is_feature_box_active')->default(true);
            $table->boolean('is_footer_active')->default(true);
            $table->boolean('is_menu_active')->default(true);
            $table->boolean('is_social_icon_active')->default(true);
            $table->boolean('is_selling_feature_banner_active')->default(true);

            $table->json('meta_title')->nullable();
            $table->json('meta_description')->nullable();
            $table->json('meta_tags')->nullable();
            
            $table->string('company_owner_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('street_no', 55)->nullable();
            $table->string('street_1')->nullable();
            $table->string('street_2')->nullable();
            $table->string('street_3')->nullable();
            $table->string('city', 120)->nullable();
            $table->string('state', 120)->nullable();
            $table->string('zip', 55)->nullable();
            $table->string('country', 125)->nullable();
            $table->string('email')->nullable();
            $table->string('phone', 17)->nullable();
            $table->string('shippo_address_object_id')->nullable();

            $table->json('footer_column_one_title')->nullable();
            $table->json('footer_column_two_title')->nullable();
            $table->json('footer_column_three_title')->nullable();
            $table->json('footer_column_four_title')->nullable();

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
