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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_published')->default(true);
            $table->json('name')->nullable();
            $table->string('code');
            $table->enum('type', ['fixed', 'percentage'])->default('percentage');
            $table->float('amount');
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->json('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
