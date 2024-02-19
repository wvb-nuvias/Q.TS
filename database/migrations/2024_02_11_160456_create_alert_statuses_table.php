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
        Schema::create('alert_statuses', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id')->nullable();
            $table->string('name',250)->nullable();
            $table->timestamps();
        });

        //add the premade roles
        DB::table('alert_statuses')->insert([
            ['tenant_id' => 1, 'name' => 'Raised'],
            ['tenant_id' => 1, 'name' => 'Acknowledged'],
            ['tenant_id' => 1, 'name' => 'Fixed without manual interruption'],
            ['tenant_id' => 1, 'name' => 'Fixed with manual interruption'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alert_statuses');
    }
};
