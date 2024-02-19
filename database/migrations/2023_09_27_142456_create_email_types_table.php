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
        Schema::create('email_types', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id');
            $table->string('name',100)->nullable();
            $table->timestamps();
        });

        DB::table('email_types')->insert([
            ['tenant_id' => 1, 'name' => 'Home'],
            ['tenant_id' => 1, 'name' => 'Work'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_types');
    }
};
