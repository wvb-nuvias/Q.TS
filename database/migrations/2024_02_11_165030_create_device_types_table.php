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
        Schema::create('device_types', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id');
            $table->string('name',250)->nullable();
            $table->timestamps();
        });

        DB::table('device_types')->insert([
            ['tenant_id' => 1, 'name' => 'Switch'],
            ['tenant_id' => 1, 'name' => 'Firewall'],
            ['tenant_id' => 1, 'name' => 'Computer'],
            ['tenant_id' => 1, 'name' => 'Server'],
            ['tenant_id' => 1, 'name' => 'Printer'],
            ['tenant_id' => 1, 'name' => 'IOT Device'],
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
