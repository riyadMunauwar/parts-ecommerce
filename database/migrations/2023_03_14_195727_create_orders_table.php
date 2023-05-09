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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->dateTime('order_date')->nullable();
            $table->dateTime('paid_at')->nullable();
            $table->decimal('total_product_price', 12, 2);
            $table->decimal('shipping_cost', 12, 2)->nullable();
            $table->decimal('total_vat', 12, 2)->nullable();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('admin_id')->nullable()->constrained('users', 'id');
            $table->foreignId('coupon_id')->nullable()->constrained();
            $table->foreignId('shipper_id')->nullable()->constrained();
            $table->string('shippo_address_object_id')->nullable();
            $table->string('lebel_url', 2048)->nullable();
            $table->string('tracking_url', 2048)->nullable();
            $table->string('tracking_number')->nullable();
            $table->string('parcel_id')->nullable();
            $table->string('rate_object_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
