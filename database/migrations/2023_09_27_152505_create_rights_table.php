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
        Schema::create('rights', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id')->nullable();
            $table->string('name',100)->nullable();
            $table->string('code',100)->nullable();
            $table->string('group',100)->nullable();
            $table->timestamps();
        });

        //add the premade rights
        DB::table('rights')->insert([
            ['tenant_id' => 1, 'name' => 'Access System',        'code' => 'ACCESS',         'group' => 'System'],
            ['tenant_id' => 1, 'name' => 'Access API',           'code' => 'ACCESS_API',     'group' => 'System'],
            ['tenant_id' => 1, 'name' => 'Access Admin',         'code' => 'ACCESS_ADMIN',   'group' => 'System'],
            ['tenant_id' => 1, 'name' => 'Access Setting',       'code' => 'ACCESS_SETTING', 'group' => 'System'],
            ['tenant_id' => 1, 'name' => 'View Profile',         'code' => 'VIEW_PROFILE',   'group' => 'System'],
            ['tenant_id' => 1, 'name' => 'Edit Profile',         'code' => 'EDIT_PROFILE',   'group' => 'System'],
            ['tenant_id' => 1, 'name' => 'Edit Types',           'code' => 'EDIT_TYPES',     'group' => 'System'],
            ['tenant_id' => 1, 'name' => 'Edit Roles',           'code' => 'EDIT_ROLES',     'group' => 'System'],
            ['tenant_id' => 1, 'name' => 'View Log',             'code' => 'VIEW_LOG',       'group' => 'System'],
            ['tenant_id' => 1, 'name' => 'Create Incident',      'code' => 'CREATE_INC',     'group' => 'Incident'],
            ['tenant_id' => 1, 'name' => 'Assign Incident',      'code' => 'ASSIGN_INC',     'group' => 'Incident'],
            ['tenant_id' => 1, 'name' => 'Edit Incident',        'code' => 'EDIT_INC',       'group' => 'Incident'],
            ['tenant_id' => 1, 'name' => 'View Incident',        'code' => 'VIEW_INC',       'group' => 'Incident'],
            ['tenant_id' => 1, 'name' => 'Close Incident',       'code' => 'CLOSE_INC',      'group' => 'Incident'],
            ['tenant_id' => 1, 'name' => 'Reopen Incident',      'code' => 'REOPEN_INC',     'group' => 'Incident'],
            ['tenant_id' => 1, 'name' => 'Delete Incident',      'code' => 'DELETE_INC',     'group' => 'Incident'],
            ['tenant_id' => 1, 'name' => 'Import Incident',      'code' => 'IMPORT_INC',     'group' => 'Incident'],
            ['tenant_id' => 1, 'name' => 'Export Incident',      'code' => 'EXPORT_INC',     'group' => 'Incident'],
            ['tenant_id' => 1, 'name' => 'Create Incident Type', 'code' => 'CREATE_INCTYPE', 'group' => 'Incident Type'],
            ['tenant_id' => 1, 'name' => 'Edit Incident Type',   'code' => 'EDIT_INCTYPE',   'group' => 'Incident Type'],
            ['tenant_id' => 1, 'name' => 'Delete Incident Type', 'code' => 'DELETE_INCTYPE', 'group' => 'Incident Type'],
            ['tenant_id' => 1, 'name' => 'Import Incident Type', 'code' => 'IMPORT_INCTYPE', 'group' => 'Incident Type'],
            ['tenant_id' => 1, 'name' => 'Export Incident Type', 'code' => 'EXPORT_INCTYPE', 'group' => 'Incident Type'],
            ['tenant_id' => 1, 'name' => 'Create User',          'code' => 'CREATE_USER',    'group' => 'User'],
            ['tenant_id' => 1, 'name' => 'Edit User',            'code' => 'EDIT_USER',      'group' => 'User'],
            ['tenant_id' => 1, 'name' => 'View User',            'code' => 'VIEW_USER',      'group' => 'User'],
            ['tenant_id' => 1, 'name' => 'Delete User',          'code' => 'DELETE_USER',    'group' => 'User'],
            ['tenant_id' => 1, 'name' => 'Import User',          'code' => 'IMPORT_USER',    'group' => 'User'],
            ['tenant_id' => 1, 'name' => 'Export User',          'code' => 'EXPORT_USER',    'group' => 'User'],
            ['tenant_id' => 1, 'name' => 'Create User Setting',  'code' => 'CREATE_USERSETTING', 'group' => 'User Setting'],
            ['tenant_id' => 1, 'name' => 'Edit User Setting',    'code' => 'EDIT_USERSETTING',   'group' => 'User Setting'],
            ['tenant_id' => 1, 'name' => 'Delete User Setting',  'code' => 'DELETE_USERSETTING', 'group' => 'User Setting'],
            ['tenant_id' => 1, 'name' => 'Import User Setting',  'code' => 'IMPORT_USERSETTING', 'group' => 'User Setting'],
            ['tenant_id' => 1, 'name' => 'Export User Setting',  'code' => 'EXPORT_USERSETTING', 'group' => 'User Setting'],
            ['tenant_id' => 1, 'name' => 'View Role',            'code' => 'VIEW_ROLE',      'group' => 'Role'],
            ['tenant_id' => 1, 'name' => 'Edit Role',            'code' => 'EDIT_ROLE',      'group' => 'Role'],
            ['tenant_id' => 1, 'name' => 'Create Role',          'code' => 'CREATE_ROLE',    'group' => 'Role'],
            ['tenant_id' => 1, 'name' => 'Delete Role',          'code' => 'DELETE_ROLE',    'group' => 'Role'],
            ['tenant_id' => 1, 'name' => 'Import Role',          'code' => 'IMPORT_ROLE',    'group' => 'Role'],
            ['tenant_id' => 1, 'name' => 'Export Role',          'code' => 'EXPORT_ROLE',    'group' => 'Role'],
            ['tenant_id' => 1, 'name' => 'Create Tenant',        'code' => 'CREATE_TENANT',  'group' => 'Tenant'],
            ['tenant_id' => 1, 'name' => 'View Tenant',          'code' => 'VIEW_TENANT',    'group' => 'Tenant'],
            ['tenant_id' => 1, 'name' => 'Edit Tenant',          'code' => 'EDIT_TENANT',    'group' => 'Tenant'],
            ['tenant_id' => 1, 'name' => 'Delete Tenant',        'code' => 'DELETE_TENANT',  'group' => 'Tenant'],
            ['tenant_id' => 1, 'name' => 'Import Tenant',        'code' => 'IMPORT_TENANT',  'group' => 'Tenant'],
            ['tenant_id' => 1, 'name' => 'Export Tenant',        'code' => 'EXPORT_TENANT',  'group' => 'Tenant'],
            ['tenant_id' => 1, 'name' => 'View Organisation',    'code' => 'VIEW_ORG',       'group' => 'Organisation'],
            ['tenant_id' => 1, 'name' => 'Create Organisation',  'code' => 'CREATE_ORG',     'group' => 'Organisation'],
            ['tenant_id' => 1, 'name' => 'Edit Organisation',    'code' => 'EDIT_ORG',       'group' => 'Organisation'],
            ['tenant_id' => 1, 'name' => 'Delete Organisation',  'code' => 'DELETE_ORG',     'group' => 'Organisation'],
            ['tenant_id' => 1, 'name' => 'Import Organisation',  'code' => 'IMPORT_ORG',     'group' => 'Organisation'],
            ['tenant_id' => 1, 'name' => 'Export Organisation',  'code' => 'EXPORT_ORG',     'group' => 'Organisation'],
            ['tenant_id' => 1, 'name' => 'Create Organisation Type', 'code' => 'CREATE_ORGTYPE', 'group' => 'Organisation Type'],
            ['tenant_id' => 1, 'name' => 'Edit Organisation Type',   'code' => 'EDIT_ORGTYPE',   'group' => 'Organisation Type'],
            ['tenant_id' => 1, 'name' => 'Delete Organisation Type', 'code' => 'DELETE_ORGTYPE', 'group' => 'Organisation Type'],
            ['tenant_id' => 1, 'name' => 'Import Organisation Type', 'code' => 'IMPORT_ORGTYPE', 'group' => 'Organisation Type'],
            ['tenant_id' => 1, 'name' => 'Export Organisation Type', 'code' => 'EXPORT_ORGTYPE', 'group' => 'Organisation Type'],
            ['tenant_id' => 1, 'name' => 'View Contact',    'code' => 'VIEW_CONTACT',       'group' => 'Contact'],
            ['tenant_id' => 1, 'name' => 'Create Contact',  'code' => 'CREATE_CONTACT',     'group' => 'Contact'],
            ['tenant_id' => 1, 'name' => 'Edit Contact',    'code' => 'EDIT_CONTACT',       'group' => 'Contact'],
            ['tenant_id' => 1, 'name' => 'Delete Contact',  'code' => 'DELETE_CONTACT',     'group' => 'Contact'],
            ['tenant_id' => 1, 'name' => 'Import Contact',  'code' => 'IMPORT_CONTACT',     'group' => 'Contact'],
            ['tenant_id' => 1, 'name' => 'Export Contact',  'code' => 'EXPORT_CONTACT',     'group' => 'Contact'],
            ['tenant_id' => 1, 'name' => 'Create Contact Type', 'code' => 'CREATE_CONTACTTYPE', 'group' => 'Contact Type'],
            ['tenant_id' => 1, 'name' => 'Edit Contact Type',   'code' => 'EDIT_CONTACTTYPE',   'group' => 'Contact Type'],
            ['tenant_id' => 1, 'name' => 'Delete Contact Type', 'code' => 'DELETE_CONTACTTYPE', 'group' => 'Contact Type'],
            ['tenant_id' => 1, 'name' => 'Import Contact Type', 'code' => 'IMPORT_CONTACTTYPE', 'group' => 'Contact Type'],
            ['tenant_id' => 1, 'name' => 'Export Contact Type', 'code' => 'EXPORT_CONTACTTYPE', 'group' => 'Contact Type'],
            ['tenant_id' => 1, 'name' => 'View Subscription',    'code' => 'VIEW_SUB',       'group' => 'Subscription'],
            ['tenant_id' => 1, 'name' => 'Create Subscription',  'code' => 'CREATE_SUB',     'group' => 'Subscription'],
            ['tenant_id' => 1, 'name' => 'Edit Subscription',    'code' => 'EDIT_SUB',       'group' => 'Subscription'],
            ['tenant_id' => 1, 'name' => 'Delete Subscription',  'code' => 'DELETE_SUB',     'group' => 'Subscription'],
            ['tenant_id' => 1, 'name' => 'Import Subscription',  'code' => 'IMPORT_SUB',     'group' => 'Subscription'],
            ['tenant_id' => 1, 'name' => 'Export Subscription',  'code' => 'EXPORT_SUB',     'group' => 'Subscription'],
            ['tenant_id' => 1, 'name' => 'Create Subscription Type', 'code' => 'CREATE_SUBTYPE', 'group' => 'Subscription Type'],
            ['tenant_id' => 1, 'name' => 'Edit Subscription Type',   'code' => 'EDIT_SUBTYPE',   'group' => 'Subscription Type'],
            ['tenant_id' => 1, 'name' => 'Delete Subscription Type', 'code' => 'DELETE_SUBTYPE', 'group' => 'Subscription Type'],
            ['tenant_id' => 1, 'name' => 'Import Subscription Type', 'code' => 'IMPORT_SUBTYPE', 'group' => 'Subscription Type'],
            ['tenant_id' => 1, 'name' => 'Export Subscription Type', 'code' => 'EXPORT_SUBTYPE', 'group' => 'Subscription Type'],
            ['tenant_id' => 1, 'name' => 'View Brand',           'code' => 'VIEW_BRAND',     'group' => 'Brand'],
            ['tenant_id' => 1, 'name' => 'Create Brand',         'code' => 'CREATE_BRAND',   'group' => 'Brand'],
            ['tenant_id' => 1, 'name' => 'Edit Brand',           'code' => 'EDIT_BRAND',     'group' => 'Brand'],
            ['tenant_id' => 1, 'name' => 'Delete Brand',         'code' => 'DELETE_BRAND',   'group' => 'Brand'],
            ['tenant_id' => 1, 'name' => 'Import Brand',         'code' => 'IMPORT_BRAND',   'group' => 'Brand'],
            ['tenant_id' => 1, 'name' => 'Export Brand',         'code' => 'EXPORT_BRAND',   'group' => 'Brand'],
            ['tenant_id' => 1, 'name' => 'View Product',         'code' => 'VIEW_PROD',      'group' => 'Product'],
            ['tenant_id' => 1, 'name' => 'Create Product',       'code' => 'CREATE_PROD',    'group' => 'Product'],
            ['tenant_id' => 1, 'name' => 'Edit Product',         'code' => 'EDIT_PROD',      'group' => 'Product'],
            ['tenant_id' => 1, 'name' => 'Delete Product',       'code' => 'DELETE_PROD',    'group' => 'Product'],
            ['tenant_id' => 1, 'name' => 'Import Product',       'code' => 'IMPORT_PROD',    'group' => 'Product'],
            ['tenant_id' => 1, 'name' => 'Export Product',       'code' => 'EXPORT_PROD',    'group' => 'Product'],
            ['tenant_id' => 1, 'name' => 'Create Product Type',  'code' => 'CREATE_PRODTYPE','group' => 'Product Type'],
            ['tenant_id' => 1, 'name' => 'Edit Product Type',    'code' => 'EDIT_PRODTYPE',  'group' => 'Product Type'],
            ['tenant_id' => 1, 'name' => 'Delete Product Type',  'code' => 'DELETE_PRODTYPE','group' => 'Product Type'],
            ['tenant_id' => 1, 'name' => 'Import Product Type',  'code' => 'IMPORT_PRODTYPE','group' => 'Product Type'],
            ['tenant_id' => 1, 'name' => 'Export Product Type',  'code' => 'EXPORT_PRODTYPE','group' => 'Product Type'],
            ['tenant_id' => 1, 'name' => 'View Alerts',          'code' => 'VIEW_ALERT',     'group' => 'Alert'],
            ['tenant_id' => 1, 'name' => 'Ack Alert',            'code' => 'ACK_ALERT',      'group' => 'Alert'],
            ['tenant_id' => 1, 'name' => 'Edit Alert',           'code' => 'EDIT_ALERT',     'group' => 'Alert'],
            ['tenant_id' => 1, 'name' => 'Delete Alert',         'code' => 'DELETE_ALERT',   'group' => 'Alert'],
            ['tenant_id' => 1, 'name' => 'Export Alert',         'code' => 'EXPORT_ALERT',   'group' => 'Alert'],
            ['tenant_id' => 1, 'name' => 'Create Alert Type',    'code' => 'CREATE_ALERTTYPE','group' => 'Alert Type'],
            ['tenant_id' => 1, 'name' => 'Edit Alert Type',      'code' => 'EDIT_ALERTTYPE',  'group' => 'Alert Type'],
            ['tenant_id' => 1, 'name' => 'Delete Alert Type',    'code' => 'DELETE_ALERTTYPE','group' => 'Alert Type'],
            ['tenant_id' => 1, 'name' => 'Import Alert Type',    'code' => 'IMPORT_ALERTTYPE','group' => 'Alert Type'],
            ['tenant_id' => 1, 'name' => 'Export Alert Type',    'code' => 'EXPORT_ALERTTYPE','group' => 'Alert Type'],
            ['tenant_id' => 1, 'name' => 'View Device',          'code' => 'VIEW_DEVICE',    'group' => 'Device'],
            ['tenant_id' => 1, 'name' => 'Create Device',        'code' => 'CREATE_DEVICE',  'group' => 'Device'],
            ['tenant_id' => 1, 'name' => 'Edit Device',          'code' => 'EDIT_DEVICE',    'group' => 'Device'],
            ['tenant_id' => 1, 'name' => 'Delete Device',        'code' => 'DELETE_DEVICE',  'group' => 'Device'],
            ['tenant_id' => 1, 'name' => 'Import Device',        'code' => 'IMPORT_DEVICE',  'group' => 'Device'],
            ['tenant_id' => 1, 'name' => 'Export Device',        'code' => 'EXPORT_DEVICE',  'group' => 'Device'],
            ['tenant_id' => 1, 'name' => 'Create Device Type',   'code' => 'CREATE_DEVICETYPE',  'group' => 'Device Type'],
            ['tenant_id' => 1, 'name' => 'Edit Device Type',     'code' => 'EDIT_DEVICETYPE',    'group' => 'Device Type'],
            ['tenant_id' => 1, 'name' => 'Delete Device Type',   'code' => 'DELETE_DEVICETYPE',  'group' => 'Device Type'],
            ['tenant_id' => 1, 'name' => 'Import Device Type',   'code' => 'IMPORT_DEVICETYPE',  'group' => 'Device Type'],
            ['tenant_id' => 1, 'name' => 'Export Device Type',   'code' => 'EXPORT_DEVICETYPE',  'group' => 'Device Type'],
            ['tenant_id' => 1, 'name' => 'Create Alert Rule',    'code' => 'CREATE_ALERTRULE','group' => 'Alert Rule'],
            ['tenant_id' => 1, 'name' => 'Edit Alert Rule',      'code' => 'EDIT_ALERTRULE',  'group' => 'Alert Rule'],
            ['tenant_id' => 1, 'name' => 'Delete Alert Rule',    'code' => 'DELETE_ALERTRULE','group' => 'Alert Rule'],
            ['tenant_id' => 1, 'name' => 'Import Alert Rule',    'code' => 'IMPORT_ALERTRULE','group' => 'Alert Rule'],
            ['tenant_id' => 1, 'name' => 'Export Alert Rule',    'code' => 'EXPORT_ALERTRULE','group' => 'Alert Rule'],
            ['tenant_id' => 1, 'name' => 'View Types',           'code' => 'VIEW_TYPES',         'group' => 'System'],
            ['tenant_id' => 1, 'name' => 'View Roles',           'code' => 'VIEW_ROLES',         'group' => 'System'],
            ['tenant_id' => 1, 'name' => 'Edit Log',           'code' => 'EDIT_LOG',         'group' => 'System'],
            ['tenant_id' => 1, 'name' => 'Delete Log',           'code' => 'DELETE_LOG',         'group' => 'System'],
            ['tenant_id' => 1, 'name' => 'View Integrations',           'code' => 'VIEW_INTEGRATIONS',         'group' => 'System'],




        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rights');
    }
};
