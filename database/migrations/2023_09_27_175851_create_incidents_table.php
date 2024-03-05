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
            $table->integer('tenant_id')->nullable();
            $table->integer('incident_nr')->nullable();
            $table->integer('created_by')->nullable();
            $table->dateTime('created_on')->nullable();
            $table->integer('updated_by')->nullable();
            $table->dateTime('updated_on')->nullable();
            $table->dateTime('assigned_to')->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('incident_type_id')->nullable();
            $table->integer('incident_status_id')->nullable();
            $table->integer('incident_severity_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->integer('subscription_id')->nullable();
            $table->string('title',200)->nullable();
            $table->text('description')->nullable();
            $table->integer('time_spent')->nullable();
            $table->string('incident_source',100)->nullable();
            $table->timestamps();
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
