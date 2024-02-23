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
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_name', 250)->nullable();
            $table->string('tenant_icon',150)->nullable();
            $table->string('tenant_logo',150)->nullable();
            $table->string('tenant_color',150)->nullable();
            $table->timestamps();
        });

        DB::table('tenants')->insert([
            ['tenant_name' => 'Default', 'tenant_icon' => 'img/icon/favicon-192.png', 'tenant_logo' => '', 'tenant_color' => 'green'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};

