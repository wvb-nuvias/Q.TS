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
        Schema::create('role_user', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('role_id')->nullable();
            $table->timestamps();
        });

        //assign role 1 to Q
        DB::table('role_user')->insert([
            ['tenant_id' => 1, 'user_id' => 1, 'role_id' => 1],
            ['tenant_id' => 1, 'user_id' => 2, 'role_id' => 3],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_user');
    }
};
