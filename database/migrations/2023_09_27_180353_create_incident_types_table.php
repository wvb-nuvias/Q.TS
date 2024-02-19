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
        Schema::create('incident_types', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id');
            $table->string('name',100)->nullable();
            $table->string('icon',255)->nullable();
            $table->string('color',100)->nullable();
            $table->timestamps();
        });

        DB::table('incident_types')->insert([
            ['tenant_id' => 1, 'name' => 'Incident', 'icon' => 'truck-medical', 'color' => 'green'],
            ['tenant_id' => 1, 'name' => 'Question', 'icon' => 'circle-question', 'color' => 'blue'],
            ['tenant_id' => 1, 'name' => 'Pre Sales', 'icon' => 'paperclip', 'color' => 'purple'],
            ['tenant_id' => 1, 'name' => 'Todo', 'icon' => 'circle-check', 'color' => 'orange'],
            ['tenant_id' => 1, 'name' => 'Installation', 'icon' => 'business-time', 'color' => 'amber'],
            ['tenant_id' => 1, 'name' => 'On Site', 'icon' => 'shoe-prints', 'color' => 'red'],
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
