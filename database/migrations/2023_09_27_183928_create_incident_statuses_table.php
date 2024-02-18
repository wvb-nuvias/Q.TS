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
        Schema::create('incident_statuses', function (Blueprint $table) {
            $table->id();
            $table->integer('tenantid');
            $table->string('name',100)->nullable();
            $table->string('icon',255)->nullable();
            $table->string('color',100)->nullable();
            $table->timestamps();
        });

        DB::table('incident_statuses')->insert([
            ['tenantid' => 1, 'name' => 'New', 'icon' => 'bolt', 'color' => 'green'],
            ['tenantid' => 1, 'name' => 'Progress', 'icon' => 'play', 'color' => 'emerald'],
            ['tenantid' => 1, 'name' => 'On Hold', 'icon' => 'pause', 'color' => 'yellow'],
            ['tenantid' => 1, 'name' => 'Waiting for Customer', 'icon' => 'shop-lock', 'color' => 'amber'],
            ['tenantid' => 1, 'name' => 'Waiting for Supplier', 'icon' => 'building-lock', 'color' => 'orange'],
            ['tenantid' => 1, 'name' => 'Closed', 'icon' => 'lock', 'color' => 'red'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incident_statuses');
    }
};
