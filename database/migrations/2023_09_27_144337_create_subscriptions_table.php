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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id')->nullable();
            $table->integer('subscription_type_id')->nullable();
            $table->string('code',20)->nullable();
            $table->integer('product_id')->nullable();
            $table->string('name',100)->nullable();
            $table->text('description')->nullable();
            $table->float('cost', 8, 2)->nullable();
            $table->timestamp('date_start')->nullable();
            $table->timestamp('date_end')->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('reseller_id')->nullable();
            $table->string('serial',50)->nullable();
            $table->integer('brand_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
