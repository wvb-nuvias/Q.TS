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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->integer('job_id')->nullable();
            $table->integer('role_id')->nullable();
            $table->integer('organization_id')->nullable();
            $table->string('firstname',100)->nullable();
            $table->string('phone',30)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            [
                'name' => 'tenantadmin',
                'email' => 'tenantadmin@qcontinuum.be',
                'password' => '$2y$12$vob0oU.DO.cIUjrVf9VO4uz1nR..YF5LZ.FoLb1lV8HqwcchGxy3S',
                'job_id' => 1,
                'role_id' => 1,
                'tenant_id' => 1,
                'organization_id' => 1,
                'firstname' => 'sys',
                'phone' => ''
            ],
        ]);
        //todo add admin user
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@qcontinuum.be',
                'password' => '$2y$12$in63qoOFSO6u5tTVXLUg/upUP7rJfoLNdcDEJ7llMLPI3fkQx/gx6',
                'job_id' => 2,
                'role_id' => 2,
                'tenant_id' => 1,
                'organization_id' => 1,
                'firstname' => 'sys',
                'phone' => ''
            ],
        ]);
        //todo add default user
        DB::table('users')->insert([
            [
                'name' => 'engineer',
                'email' => 'engineer@qcontinuum.be',
                'password' => '$2y$12$.HuFdmMbVVCqjV9Uzx1ifOAqzfjple2MJjti0ggrMju7QcgLy97eK',
                'job_id' => 3,
                'role_id' => 3,
                'tenant_id' => 1,
                'organization_id' => 1,
                'firstname' => 'sys',
                'phone' => ''
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
