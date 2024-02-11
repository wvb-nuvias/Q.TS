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
            $table->integer('tenantid');
            $table->string('name',250)->nullable();
            $table->timestamps();
        });

        //add the premade roles
        DB::table('device_types')->insert([
            ['tenantid' => 1, 'name' => 'Switch'],
            ['tenantid' => 1, 'name' => 'Firewall'],
            ['tenantid' => 1, 'name' => 'Computer'],
            ['tenantid' => 1, 'name' => 'Server'],
            ['tenantid' => 1, 'name' => 'Printer'],
            ['tenantid' => 1, 'name' => 'IOT Device'],
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
