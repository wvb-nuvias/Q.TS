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
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('language_code',10)->nullable();
            $table->string('language_name',150)->nullable();
            $table->string('language_flag',150)->nullable();
            $table->timestamps();
        });

        DB::table('languages')->insert([
            ['language_code' => 'en', 'language_name' => 'English', 'language_flag' => 'en.svg'],
            ['language_code' => 'nl', 'language_name' => 'Dutch', 'language_flag' => 'nl.svg'],
            ['language_code' => 'fr', 'language_name' => 'French', 'language_flag' => 'fr.svg'],
            ['language_code' => 'ge', 'language_name' => 'German', 'language_flag' => 'ge.svg'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('languages');
    }
};
