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
        Schema::create('incident_severities', function (Blueprint $table) {
            $table->id();
            $table->integer('tenantid');
            $table->string('name',100)->nullable();
            $table->string('icon',255)->nullable();
            $table->string('color',100)->nullable();
            $table->timestamps();
        });

        DB::table('incident_severities')->insert([
            ['tenantid' => 1, 'name' => 'Low', 'icon' => 'temperature-empty', 'color' => 'green'],
            ['tenantid' => 1, 'name' => 'Moderate', 'icon' => 'temperature-quarter', 'color' => 'emerald'],
            ['tenantid' => 1, 'name' => 'Medium', 'icon' => 'temperature-half', 'color' => 'yellow'],
            ['tenantid' => 1, 'name' => 'High', 'icon' => 'temperature-three-quarters', 'color' => 'orange'],
            ['tenantid' => 1, 'name' => 'Critical', 'icon' => 'temperature-full', 'color' => 'red'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incident_severities');
    }
};
