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
        Schema::create('incidents', function (Blueprint $table) {
            $table->id();
            $table->integer('tenantid');
            $table->timestamps();
            $table->integer('createdby')->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('incident_type_id')->nullable();
            $table->integer('incident_status_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->integer('subscription_id')->nullable();
            $table->string('title',200)->nullable();
            $table->text('description')->nullable();
            $table->integer('timespent')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidents');
    }
};
