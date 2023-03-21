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
            $table->float('total_product_price');
            $table->float('shipping_cost')->nullable();
            $table->float('total_vat')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('admin_id')->nullalbe()->constrained('users', 'id');
            $table->foreignId('coupon_id')->nullalbe()->constrained();
            $table->foreignId('shipper_id')->nullalbe()->constrained();
            $table->foreignId('payment_method_id')->nullalbe()->constrained();
            $table->foreignId('order_status_id')->nullalbe()->constrained();
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
