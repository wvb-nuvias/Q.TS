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
            $table->integer('tenantid');
            $table->timestamps();
            $table->string('name',100)->nullable();
        });

        DB::table('incident_types')->insert([
            ['tenantid' => 1, 'name' => 'Incident'],
            ['tenantid' => 1, 'name' => 'Question'],
            ['tenantid' => 1, 'name' => 'Presales'],
            ['tenantid' => 1, 'name' => 'Todo'],
            ['tenantid' => 1, 'name' => 'Installation'],
            ['tenantid' => 1, 'name' => 'On Site'],
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
