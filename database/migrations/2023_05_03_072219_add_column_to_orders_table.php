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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('order_note', 1024)->nullable();
            $table->string('admin_note', 1024)->nullable();
            $table->float('parcel_height')->nullable();
            $table->float('parcel_length')->nullable();
            $table->float('parcel_width')->nullable();
            $table->datetime('shipped_date')->nullable();
            $table->datetime('estimate_delivery_date')->nullable();
            $table->string('estimate_delivery_time')->nullable();
            $table->enum('status', ['Canceled', 'Complated', 'Paid', 'On Hold', 'Pending', 'Pending Payment', 'Processing', 'Refunded']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            Schema::dropColumn('order_note');
            Schema::dropColumn('admin_note');
            Schema::dropColumn('parcel_height');
            Schema::dropColumn('parcel_length');
            Schema::dropColumn('parcel_width');
            Schema::dropColumn('shipped_date');
            Schema::dropColumn('estimate_delivery_date');
            Schema::dropColumn('estimate_delivery_time');
            Schema::dropColumn('status');
        });
    }
};
