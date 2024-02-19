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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id');
            $table->integer('hidden');
            $table->timestamps();
            $table->string('name',100)->nullable();
        });

        //add the premade roles
        DB::table('roles')->insert([
            ['tenant_id' => 1, 'hidden' => 1, 'name' => 'Tenant Administrator'],
            ['tenant_id' => 1, 'hidden' => 0, 'name' => 'Administrator'],
            ['tenant_id' => 1, 'hidden' => 0, 'name' => 'Operator'],
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
