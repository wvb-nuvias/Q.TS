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
        Schema::create('phone_types', function (Blueprint $table) {
            $table->id();
            $table->integer('tenantid');
            $table->timestamps();
            $table->string('name',100)->nullable();
        });

        DB::table('phone_types')->insert([
            ['tenantid' => 1, 'name' => 'Home'],
            ['tenantid' => 1, 'name' => 'Work'],
            ['tenantid' => 1, 'name' => 'Mobile Home'],
            ['tenantid' => 1, 'name' => 'Mobile Work'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phone_types');
    }
};
