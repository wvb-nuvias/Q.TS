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
        Schema::create('alert_statuses', function (Blueprint $table) {
            $table->id();
            $table->integer('tenantid');
            $table->string('name',250)->nullable();
            $table->timestamps();
        });

        //add the premade roles
        DB::table('alert_statuses')->insert([
            ['tenantid' => 1, 'name' => 'Raised'],
            ['tenantid' => 1, 'name' => 'Acknowledged'],
            ['tenantid' => 1, 'name' => 'Fixed without manual interruption'],
            ['tenantid' => 1, 'name' => 'Fixed with manual interruption'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alert_statuses');
    }
};
