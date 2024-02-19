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
        Schema::table('users', function (Blueprint $table) {
            //todo add default tenant admin
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
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

        });
    }
};
