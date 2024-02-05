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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->integer('tenantid');
            $table->timestamps();
            $table->string('name',100)->nullable();
        });

        DB::table('jobs')->insert([
            ['tenantid' => 1, 'name' => 'CEO / Co-Founder'],
            ['tenantid' => 1, 'name' => 'Security Engineer'],
            ['tenantid' => 1, 'name' => 'Presales Engineer'],
            ['tenantid' => 1, 'name' => 'Sales Person'],
            ['tenantid' => 1, 'name' => 'IT Person'],
            ['tenantid' => 1, 'name' => '3rd Party IT'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
