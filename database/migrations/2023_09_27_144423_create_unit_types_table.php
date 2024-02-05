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
        Schema::create('unit_types', function (Blueprint $table) {
            $table->id();
            $table->integer('tenantid');
            $table->timestamps();
            $table->string('name',100)->nullable();
        });

        DB::table('unit_types')->insert([
            ['tenantid' => 1, 'name' => 'Per Hour'],
            ['tenantid' => 1, 'name' => 'Per Device'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit_types');
    }
};
