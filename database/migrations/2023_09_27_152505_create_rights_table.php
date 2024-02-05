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
        Schema::create('rights', function (Blueprint $table) {
            $table->id();
            $table->integer('tenantid');
            $table->timestamps();
            $table->string('name',100)->nullable();
        });

        //add the premade rights
        DB::table('rights')->insert([
            ['tenantid' => 1, 'name' => 'Create Incident'],
            ['tenantid' => 1, 'name' => 'Assign Incident'],
            ['tenantid' => 1, 'name' => 'Edit Incident'],
            ['tenantid' => 1, 'name' => 'Close Incident'],
            ['tenantid' => 1, 'name' => 'Delete Incident'],
            ['tenantid' => 1, 'name' => 'Create User'],
            ['tenantid' => 1, 'name' => 'Edit User'],
            ['tenantid' => 1, 'name' => 'Delete User'],
            ['tenantid' => 1, 'name' => 'Create Tenant'],
            ['tenantid' => 1, 'name' => 'Edit Tenant'],
            ['tenantid' => 1, 'name' => 'Delete Tenant'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rights');
    }
};
