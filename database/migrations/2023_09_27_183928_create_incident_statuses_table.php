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
            $table->timestamps();
            $table->string('name',100)->nullable();
        });

        DB::table('incident_statuses')->insert([
            ['tenantid' => 1, 'name' => 'New'],
            ['tenantid' => 1, 'name' => 'Progress'],
            ['tenantid' => 1, 'name' => 'On Hold'],
            ['tenantid' => 1, 'name' => 'Waiting for Customer'],
            ['tenantid' => 1, 'name' => 'Waiting for Supplier'],
            ['tenantid' => 1, 'name' => 'Closed'],
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
