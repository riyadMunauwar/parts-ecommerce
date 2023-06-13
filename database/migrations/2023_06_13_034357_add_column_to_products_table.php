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
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('wholesale_price', 12, 2);
            $table->decimal('royal_sale_price', 12, 2);
            $table->decimal('retailer_sale_price', 12, 2);
            $table->foreignId('wholesaler_id')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('wholesale_price');
            $table->dropColumn('royal_sale_price');
            $table->dropColumn('retailer_sale_price');
            $table->dropColumn('wholesaler_id');
        });
    }
};
