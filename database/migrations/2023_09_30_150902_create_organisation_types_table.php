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
        Schema::create('organisation_types', function (Blueprint $table) {
            $table->id();
            $table->integer('tenantid');
            $table->integer('hidden');
            $table->timestamps();
            $table->string('name',100)->nullable();
        });

        DB::table('organisation_types')->insert([
            ['tenantid' => 1, 'hidden' => 1, 'name' => 'Master'],
            ['tenantid' => 1, 'hidden' => 0, 'name' => 'Normal'],
            ['tenantid' => 1, 'hidden' => 0, 'name' => 'Prospect'],
            ['tenantid' => 1, 'hidden' => 0, 'name' => 'Reseller'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organisation_types');
    }
};
