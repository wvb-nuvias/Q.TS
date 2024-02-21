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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id')->nullable();
            $table->integer('hidden')->nullable();
            $table->string('role_name',100)->nullable();
            $table->timestamps();
        });

        //add the pre made roles
        DB::table('roles')->insert([
            ['tenant_id' => 1, 'hidden' => 1, 'role_name' => 'Tenant Administrator'],
            ['tenant_id' => 1, 'hidden' => 0, 'role_name' => 'Administrator'],
            ['tenant_id' => 1, 'hidden' => 0, 'role_name' => 'Operator'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
