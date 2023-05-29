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
        Schema::table('settings', function (Blueprint $table) {
            $table->string('selling_feature_column_1')->nullable();
            $table->string('selling_feature_column_2')->nullable();
            $table->string('selling_feature_column_3')->nullable();
            $table->string('selling_feature_column_4')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('selling_feature_column_1');
            $table->dropColumn('selling_feature_column_2');
            $table->dropColumn('selling_feature_column_3');
            $table->dropColumn('selling_feature_column_4');
        });
    }
};
