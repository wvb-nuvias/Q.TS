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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id');
            $table->timestamps();
            $table->integer('address_type_id')->nullable();
            $table->integer('ordinal')->nullable();
            $table->string('street',150)->nullable();
            $table->string('number',10)->nullable();
            $table->string('apartment',10)->nullable();
            $table->string('postal',10)->nullable();
            $table->string('city',150)->nullable();
            $table->string('region',150)->nullable();
            $table->string('country',150)->nullable();
            $table->float('lat',8,4)->nullable();
            $table->float('lng',8,4)->nullable();
        });

        DB::table('addresses')->insert([
            [
             'tenant_id' => 1,
             'address_type_id' => 1,
             'ordinal' => 1,
             'street' => 'Hoogboomsteenweg',
             'number' => '12',
             'apartment' => '1003',
             'postal' => '2930',
             'city' => 'Brasschaat',
             'region' => 'Antwerp',
             'country' => 'Belgium',
             'lat' => 51.3044,
             'lng' => 4.48542
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
