<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('incident_statuses', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id')->nullable();
            $table->string('incident_status_name',100)->nullable();
            $table->string('incident_status_icon',255)->nullable();
            $table->string('incident_status_color',100)->nullable();
            $table->timestamps();
        });

        DB::table('incident_statuses')->insert([
            ['tenant_id' => 1, 'incident_status_name' => 'New', 'incident_status_icon' => 'bolt', 'incident_status_color' => 'green'],
            ['tenant_id' => 1, 'incident_status_name' => 'Progress', 'incident_status_icon' => 'play', 'incident_status_color' => 'emerald'],
            ['tenant_id' => 1, 'incident_status_name' => 'On Hold', 'incident_status_icon' => 'pause', 'incident_status_color' => 'yellow'],
            ['tenant_id' => 1, 'incident_status_name' => 'Waiting for Customer', 'incident_status_icon' => 'shop-lock', 'incident_status_color' => 'amber'],
            ['tenant_id' => 1, 'incident_status_name' => 'Waiting for Supplier', 'incident_status_icon' => 'building-lock', 'incident_status_color' => 'orange'],
            ['tenant_id' => 1, 'incident_status_name' => 'Closed', 'incident_status_icon' => 'lock', 'incident_status_color' => 'red'],
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
