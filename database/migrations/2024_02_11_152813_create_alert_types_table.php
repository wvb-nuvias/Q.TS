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
        Schema::create('alert_types', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id')->nullable();
            $table->string('alert_type_name',250)->nullable();
            $table->string('alert_type_icon',150)->nullable();
            $table->string('alert_type_color',150)->nullable();
            $table->timestamps();
        });

        //add the premade roles
        DB::table('alert_types')->insert([
            ['tenant_id' => 1, 'alert_type_name' => 'ICMP Unreachable', 'alert_type_icon' => 'magnifying-glass-chart', 'alert_type_color' => 'red'],
            ['tenant_id' => 1, 'alert_type_name' => 'SNMP Unreachable', 'alert_type_icon' => 'magnifying-glass-location', 'alert_type_color' => 'orange'],
            ['tenant_id' => 1, 'alert_type_name' => 'Cluster Failover', 'alert_type_icon' => '', 'circle-exclamation' => 'amber'],
            ['tenant_id' => 1, 'alert_type_name' => 'Other Alert', 'alert_type_icon' => 'bell', 'alert_type_color' => 'blue'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alert_types');
    }
};
