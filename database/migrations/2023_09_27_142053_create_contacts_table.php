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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id')->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('contact_type_id')->nullable();
            $table->integer('job_id')->nullable();
            $table->string('lastname',100)->nullable();
            $table->string('firstname',100)->nullable();
            $table->string('language',4)->nullable();
            $table->string('contact_source',100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
