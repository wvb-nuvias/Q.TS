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
            $table->integer('tenantid');
            $table->timestamps();
            $table->integer('subscription_type_id')->nullable();
            $table->string('code',20)->nullable();
            $table->string('name',100)->nullable();
            $table->text('description')->nullable();
            $table->integer('invoicetype')->nullable();
            $table->float('cost', 8, 2)->nullable();
            $table->timestamp('subscriptionstart')->nullable();
            $table->timestamp('subscriptionend')->nullable();
            $table->integer('organisation_id')->nullable();
            $table->integer('reseller_id')->nullable();
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
