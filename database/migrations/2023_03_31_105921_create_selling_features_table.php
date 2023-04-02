<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selling_features', function (Blueprint $table) {
            $table->id();
            $table->json('selling_feature_one')->nullable();
            $table->string('selling_feature_one_link', 2048)->nullable();
            $table->json('selling_feature_two')->nullable();
            $table->string('selling_feature_two_link', 2048)->nullable();
            $table->json('selling_feature_three')->nullable();
            $table->string('selling_feature_three_link', 2048)->nullable();
            $table->json('selling_feature_four')->nullable();
            $table->string('selling_feature_four_link', 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('selling_features');
    }
};
