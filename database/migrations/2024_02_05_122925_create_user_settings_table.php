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
        Schema::create('user_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('key',30)->nullable();
            $table->string('val',20)->nullable();
            $table->timestamps();
        });

        DB::table('user_settings')->insert([
            ['tenant_id' => 1, 'user_id' => 1, 'key' => 'theme', 'val' => 'dark'],
            ['tenant_id' => 1, 'user_id' => 1, 'key' => 'themecolor1', 'val' => 'green-500'],
            ['tenant_id' => 1, 'user_id' => 1, 'key' => 'themecolor2', 'val' => 'blue-500'],
            ['tenant_id' => 1, 'user_id' => 1, 'key' => 'sidepanelbgcolor', 'val' => 'slate-850'],
            ['tenant_id' => 1, 'user_id' => 2, 'key' => 'theme', 'val' => 'light'],
            ['tenant_id' => 1, 'user_id' => 2, 'key' => 'themecolor1', 'val' => 'green-500'],
            ['tenant_id' => 1, 'user_id' => 2, 'key' => 'themecolor2', 'val' => 'blue-500'],
            ['tenant_id' => 1, 'user_id' => 2, 'key' => 'sidepanelbgcolor', 'val' => 'slate-850'],
            ['tenant_id' => 1, 'user_id' => 3, 'key' => 'theme', 'val' => 'light'],
            ['tenant_id' => 1, 'user_id' => 3, 'key' => 'themecolor1', 'val' => 'green-500'],
            ['tenant_id' => 1, 'user_id' => 3, 'key' => 'themecolor2', 'val' => 'blue-500'],
            ['tenant_id' => 1, 'user_id' => 3, 'key' => 'sidepanelbgcolor', 'val' => 'slate-850'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_settings');
    }
};
