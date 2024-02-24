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
        Schema::create('integrations', function (Blueprint $table) {
            $table->id();
            $table->string('integration_name',150)->nullable();
            $table->string('integration_icon',150)->nullable();
            $table->string('integration_logo',150)->nullable();
            $table->string('integration_color',150)->nullable();
            $table->string('integration_url',150)->nullable();
            $table->integer('integration_author_id')->nullable();
            $table->text('integration_description')->nullable();
            $table->integer('integration_type')->nullable();
            $table->timestamps();
        });

        DB::table('integrations')->insert([
            ['integration_name' => 'Microsoft Teams','integration_icon' => 'fa-brands fa-microsoft','integration_logo' => '','integration_color' => 'green','integration_url' => '','integration_author_id' => 1,'integration_description' => 'Allows The sending of a webhook to Ms Teams channel, adds settings panel and functionality in GUI','integration_type' => 3],
            ['integration_name' => 'Spryng SMS','integration_icon' => 'fa fa-message','integration_logo' => '','integration_color' => 'blue','integration_url' => '','integration_author_id' => 1,'integration_description' => 'Allows The sending of a SMS to Spryng API, adds settings panel and functionality in GUI','integration_type' => 3],
            ['integration_name' => 'Watchguard','integration_icon' => 'fa fa-fire-flame-curved','integration_logo' => '','integration_color' => 'red','integration_url' => '','integration_author_id' => 1,'integration_description' => 'Enables The Watchguard Device Functions','integration_type' => 1],
            ['integration_name' => 'Afas Connector','integration_icon' => 'fa fa-upload','integration_logo' => '','integration_color' => 'purple','integration_url' => '','integration_author_id' => 1,'integration_description' => 'Enables the import using AFAS Getconnectors, and settings panel','integration_type' => 2],
            ['integration_name' => 'LibreNMS Connector','integration_icon' => 'fa fa-upload','integration_logo' => '','integration_color' => 'emerald','integration_url' => '','integration_author_id' => 1,'integration_description' => 'Enables the import/export of devices and alerts using LibreNMS, and settings panel','integration_type' => 2],
            ['integration_name' => 'API Connector','integration_icon' => 'fa fa-upload','integration_logo' => '','integration_color' => 'amber','integration_url' => '','integration_author_id' => 1,'integration_description' => 'Enables import of data using an external API','integration_type' => 2],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('integrations');
    }
};
