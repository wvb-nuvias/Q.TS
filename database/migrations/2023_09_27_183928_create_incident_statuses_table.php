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
            $table->integer('tenant_id');
            $table->string('name',100)->nullable();
            $table->string('icon',255)->nullable();
            $table->string('color',100)->nullable();
            $table->timestamps();
        });

        DB::table('incident_statuses')->insert([
            ['tenant_id' => 1, 'name' => 'New', 'icon' => 'bolt', 'color' => 'green'],
            ['tenant_id' => 1, 'name' => 'Progress', 'icon' => 'play', 'color' => 'emerald'],
            ['tenant_id' => 1, 'name' => 'On Hold', 'icon' => 'pause', 'color' => 'yellow'],
            ['tenant_id' => 1, 'name' => 'Waiting for Customer', 'icon' => 'shop-lock', 'color' => 'amber'],
            ['tenant_id' => 1, 'name' => 'Waiting for Supplier', 'icon' => 'building-lock', 'color' => 'orange'],
            ['tenant_id' => 1, 'name' => 'Closed', 'icon' => 'lock', 'color' => 'red'],
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
