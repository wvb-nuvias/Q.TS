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
        Schema::create('device_group_device', function (Blueprint $table) {
            $table->id();
            $table->integer('tenantid');
            $table->timestamps();
            $table->integer('device_id');
            $table->integer('devicegroup_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('device_group_device');
    }
};