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
        Schema::create('incident_severities', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id')->nullable();
            $table->string('incident_severity_name',100)->nullable();
            $table->string('incident_severity_icon',255)->nullable();
            $table->string('incident_severity_color',100)->nullable();
            $table->timestamps();
        });

        DB::table('incident_severities')->insert([
            ['tenant_id' => 1, 'incident_severity_name' => 'Low', 'incident_severity_icon' => 'temperature-empty', 'incident_severity_color' => 'green'],
            ['tenant_id' => 1, 'incident_severity_name' => 'Moderate', 'incident_severity_icon' => 'temperature-quarter', 'incident_severity_color' => 'emerald'],
            ['tenant_id' => 1, 'incident_severity_name' => 'Medium', 'incident_severity_icon' => 'temperature-half', 'incident_severity_color' => 'yellow'],
            ['tenant_id' => 1, 'incident_severity_name' => 'High', 'incident_severity_icon' => 'temperature-three-quarters', 'incident_severity_color' => 'orange'],
            ['tenant_id' => 1, 'incident_severity_name' => 'Critical', 'incident_severity_icon' => 'temperature-full', 'incident_severity_color' => 'red'],
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
