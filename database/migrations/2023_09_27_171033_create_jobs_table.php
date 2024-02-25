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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id')->nullable();
            $table->string('job_name',100)->nullable();
            $table->string('job_source',100)->nullable();
            $table->timestamps();
        });

        DB::table('jobs')->insert([
            ['tenant_id' => 1, 'job_name' => 'CEO / Co-Founder', 'job_source' => 'system'],
            ['tenant_id' => 1, 'job_name' => 'Team Leader', 'job_source' => 'system'],
            ['tenant_id' => 1, 'job_name' => 'Security Engineer', 'job_source' => 'system'],
            ['tenant_id' => 1, 'job_name' => 'Pre Sales Engineer', 'job_source' => 'system'],
            ['tenant_id' => 1, 'job_name' => 'Sales Person', 'job_source' => 'system'],
            ['tenant_id' => 1, 'job_name' => 'IT Person', 'job_source' => 'system'],
            ['tenant_id' => 1, 'job_name' => '3rd Party IT', 'job_source' => 'system'],
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
