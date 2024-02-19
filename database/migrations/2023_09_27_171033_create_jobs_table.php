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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id');
            $table->timestamps();
            $table->string('name',100)->nullable();
        });

        DB::table('jobs')->insert([
            ['tenant_id' => 1, 'name' => 'CEO / Co-Founder'],
            ['tenant_id' => 1, 'name' => 'Team Leader'],
            ['tenant_id' => 1, 'name' => 'Security Engineer'],
            ['tenant_id' => 1, 'name' => 'Pre Sales Engineer'],
            ['tenant_id' => 1, 'name' => 'Sales Person'],
            ['tenant_id' => 1, 'name' => 'IT Person'],
            ['tenant_id' => 1, 'name' => '3rd Party IT'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
