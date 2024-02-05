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
        Schema::create('right_role', function (Blueprint $table) {
            $table->id();
            $table->integer('tenantid');
            $table->timestamps();
            $table->integer('role_id')->nullable();
            $table->integer('right_id')->nullable();
        });

        DB::table('right_role')->insert([
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 1],
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 2],
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 3],
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 4],
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 5],
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 6],
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 7],
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 8],
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 9],
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 10],
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 11],
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 1],
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 2],
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 3],
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 4],
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 5],
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 6],
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 7],
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 8],
            ['tenantid' => 1, 'role_id' => 3, 'right_id' => 1],
            ['tenantid' => 1, 'role_id' => 3, 'right_id' => 3],
            ['tenantid' => 1, 'role_id' => 3, 'right_id' => 4],
            ['tenantid' => 1, 'role_id' => 3, 'right_id' => 5],

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('right_role');
    }
};
