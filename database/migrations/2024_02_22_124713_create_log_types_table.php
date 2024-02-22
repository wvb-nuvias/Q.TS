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
        Schema::create('log_types', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id')->nullable();
            $table->string('log_type_name',250)->nullable();
            $table->string('log_type_icon',255)->nullable();
            $table->string('log_type_color',100)->nullable();
            $table->timestamps();
        });

        DB::table('log_types')->insert([
            ['tenant_id' => 1, 'log_type_name' => 'all', 'log_type_icon' => 'list-check', 'log_type_color' => 'purple'],
            ['tenant_id' => 1, 'log_type_name' => 'info', 'log_type_icon' => 'circle-info', 'log_type_color' => 'green'],
            ['tenant_id' => 1, 'log_type_name' => 'debug', 'log_type_icon' => 'bug', 'log_type_color' => 'blue'],
            ['tenant_id' => 1, 'log_type_name' => 'warn', 'log_type_icon' => 'circle-exclamation', 'log_type_color' => 'orange'],
            ['tenant_id' => 1, 'log_type_name' => 'error', 'log_type_icon' => 'xmark', 'log_type_color' => 'red'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_types');
    }
};
