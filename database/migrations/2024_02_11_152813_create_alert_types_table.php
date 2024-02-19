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
        Schema::create('alert_types', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id');
            $table->string('name',250)->nullable();
            $table->timestamps();
        });

        //add the premade roles
        DB::table('alert_types')->insert([
            ['tenant_id' => 1, 'name' => 'ICMP Unreachable'],
            ['tenant_id' => 1, 'name' => 'SNMP Unreachable'],
            ['tenant_id' => 1, 'name' => 'Cluster Failover'],
            ['tenant_id' => 1, 'name' => 'Other Failover'],
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
