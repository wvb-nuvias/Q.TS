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
        Schema::create('device_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id')->nullable();
            $table->integer('device_id')->nullable();
            $table->string('readonlyuser',50)->nullable();
            $table->string('readonlypass', 160)->nullable();
            $table->string('readwriteuser',50)->nullable();
            $table->string('readwritepass', 160)->nullable();
            $table->json('snmpproperties')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('device_settings');
    }
};
