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
            $table->timestamps();
        });

        DB::table('device_types')->insert([
            ['tenant_id' => 1, 'device_type_name' => 'Switch'],
            ['tenant_id' => 1, 'device_type_name' => 'Firewall'],
            ['tenant_id' => 1, 'device_type_name' => 'Computer'],
            ['tenant_id' => 1, 'device_type_name' => 'Server'],
            ['tenant_id' => 1, 'device_type_name' => 'Printer'],
            ['tenant_id' => 1, 'device_type_name' => 'IOT Device'],
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
