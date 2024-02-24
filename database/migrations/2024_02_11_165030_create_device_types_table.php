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
        Schema::create('device_types', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id')->nullable();
            $table->string('device_type_name',250)->nullable();
            $table->string('device_type_icon',150)->nullable();
            $table->string('device_type_color',150)->nullable();
            $table->timestamps();
        });

        DB::table('device_types')->insert([
            ['tenant_id' => 1, 'device_type_name' => 'Switch', 'device_type_icon' => 'network-wired', 'device_type_color' => 'green'],
            ['tenant_id' => 1, 'device_type_name' => 'Firewall', 'device_type_icon' => 'fire-flame-curved', 'device_type_color' => 'red'],
            ['tenant_id' => 1, 'device_type_name' => 'Computer', 'device_type_icon' => 'computer', 'device_type_color' => 'blue'],
            ['tenant_id' => 1, 'device_type_name' => 'Server', 'device_type_icon' => 'server', 'device_type_color' => 'orange'],
            ['tenant_id' => 1, 'device_type_name' => 'Printer', 'device_type_icon' => 'print', 'device_type_color' => 'emerald'],
            ['tenant_id' => 1, 'device_type_name' => 'IOT Device', 'device_type_icon' => 'microchip', 'device_type_color' => 'purple'],
            ['tenant_id' => 1, 'device_type_name' => 'Laptop', 'device_type_icon' => 'laptop', 'device_type_color' => 'amber'],
            ['tenant_id' => 1, 'device_type_name' => 'Mobile', 'device_type_icon' => 'mobile', 'device_type_color' => 'teal'],
            ['tenant_id' => 1, 'device_type_name' => 'AP', 'device_type_icon' => 'wifi', 'device_type_color' => 'green'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('device_types');
    }
};
