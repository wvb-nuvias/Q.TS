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
        Schema::create('incident_types', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id')->nullable();
            $table->string('incident_type_name',100)->nullable();
            $table->string('incident_type_icon',255)->nullable();
            $table->string('incident_type_color',100)->nullable();
            $table->timestamps();
        });

        DB::table('incident_types')->insert([
            ['tenant_id' => 1, 'incident_type_name' => 'Incident', 'incident_type_icon' => 'truck-medical', 'incident_type_color' => 'green'],
            ['tenant_id' => 1, 'incident_type_name' => 'Question', 'incident_type_icon' => 'circle-question', 'incident_type_color' => 'blue'],
            ['tenant_id' => 1, 'incident_type_name' => 'Pre Sales', 'incident_type_icon' => 'paperclip', 'incident_type_color' => 'purple'],
            ['tenant_id' => 1, 'incident_type_name' => 'Todo', 'incident_type_icon' => 'circle-check', 'incident_type_color' => 'orange'],
            ['tenant_id' => 1, 'incident_type_name' => 'Installation', 'incident_type_icon' => 'business-time', 'incident_type_color' => 'amber'],
            ['tenant_id' => 1, 'incident_type_name' => 'On Site', 'incident_type_icon' => 'shoe-prints', 'incident_type_color' => 'red'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incident_types');
    }
};
