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
        Schema::create('right_role', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id')->nullable();
            $table->integer('role_id')->nullable();
            $table->integer('right_id')->nullable();
            $table->timestamps();
        });

        DB::table('right_role')->insert([
            //Tenant Administrator

            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 1], //ACCESS
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 2], //ACCESS_API
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 3], //ACCESS_ADMIN
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 4], //ACCESS_SETTING
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 5], //VIEW_PROFILE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 6], //EDIT_PROFILE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 7], //EDIT_TYPES
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 8], //EDIT_ROLES
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 9], //VIEW_LOG
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 10], //CREATE_INC
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 11], //ASSIGN_INC
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 12], //EDIT_INC
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 13], //VIEW_INC
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 14], //CLOSE_INC
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 15], //REOPEN_INC
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 16], //DELETE_INC
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 17], //IMPORT_INC
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 18], //EXPORT_INC
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 19], //CREATE_INCTYPE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 20], //EDIT_INCTYPE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 21], //DELETE_INCTYPE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 22], //IMPORT_INCTYPE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 23], //EXPORT_INCTYPE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 24], //CREATE_USER
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 25], //EDIT_USER
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 26], //VIEW_USER
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 27], //DELETE_USER
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 28], //IMPORT_USER
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 29], //EXPORT_USER
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 30], //CREATE_USERSETTING
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 31], //EDIT_USERSETTING
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 32], //DELETE_USERSETTING
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 33], //IMPORT_USERSETTING
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 34], //EXPORT_USERSETTING
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 35], //VIEW_ROLE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 36], //EDIT_ROLE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 37], //CREATE_ROLE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 38], //DELETE_ROLE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 39], //IMPORT_ROLE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 40], //EXPORT_ROLE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 41], //CREATE_TENANT
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 42], //VIEW_TENANT
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 43], //EDIT_TENANT
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 44], //DELETE_TENANT
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 45], //IMPORT_TENANT
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 46], //EXPORT_TENANT
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 47], //VIEW_ORG
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 48], //CREATE_ORG
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 49], //EDIT_ORG
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 50], //DELETE_ORG
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 51], //IMPORT_ORG
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 52], //EXPORT_ORG
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 53], //CREATE_ORGTYPE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 54], //EDIT_ORGTYPE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 55], //DELETE_ORGTYPE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 56], //IMPORT_ORGTYPE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 57], //EXPORT_ORGTYPE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 58], //VIEW_CONTACT
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 59], //CREATE_CONTACT
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 60], //EDIT_CONTACT
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 61], //DELETE_CONTACT
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 62], //IMPORT_CONTACT
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 63], //EXPORT_CONTACT
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 64], //CREATE_CONTACTTYPE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 65], //EDIT_CONTACTTYPE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 66], //DELETE_CONTACTTYPE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 67], //IMPORT_CONTACTTYPE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 68], //EXPORT_CONTACTTYPE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 69], //VIEW_SUB
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 70], //CREATE_SUB
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 71], //EDIT_SUB
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 72], //DELETE_SUB
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 73], //IMPORT_SUB
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 74], //EXPORT_SUB
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 75], //CREATE_SUBTYPE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 76], //EDIT_SUBTYPE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 77], //DELETE_SUBTYPE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 78], //IMPORT_SUBTYPE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 79], //EXPORT_SUBTYPE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 80], //VIEW_BRAND
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 81], //CREATE_BRAND
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 82], //EDIT_BRAND
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 83], //DELETE_BRAND
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 84], //IMPORT_BRAND
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 85], //EXPORT_BRAND
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 86], //VIEW_PROD
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 87], //CREATE_PROD
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 88], //EDIT_PROD
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 89], //DELETE_PROD
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 90], //IMPORT_PROD
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 91], //EXPORT_PROD
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 92], //CREATE_PRODTYPE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 93], //EDIT_PRODTYPE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 94], //DELETE_PRODTYPE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 95], //IMPORT_PRODTYPE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 96], //EXPORT_PRODTYPE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 97], //VIEW_ALERT
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 98], //ACK_ALERT
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 99], //EDIT_ALERT
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 100], //DELETE_ALERT
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 101], //EXPORT_ALERT
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 102], //CREATE_ALERTTYPE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 103], //EDIT_ALERTTYPE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 104], //DELETE_ALERTTYPE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 105], //IMPORT_ALERTTYPE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 106], //EXPORT_ALERTTYPE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 107], //VIEW_DEVICE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 108], //CREATE_DEVICE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 109], //EDIT_DEVICE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 110], //DELETE_DEVICE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 111], //IMPORT_DEVICE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 112], //EXPORT_DEVICE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 113], //CREATE_DEVICETYPE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 114], //EDIT_DEVICETYPE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 115], //DELETE_DEVICETYPE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 116], //IMPORT_DEVICETYPE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 117], //EXPORT_DEVICETYPE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 118], //CREATE_ALERTRULE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 119], //EDIT_ALERTRULE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 120], //DELETE_ALERTRULE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 121], //IMPORT_ALERTRULE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 122], //EXPORT_ALERTRULE
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 123], //VIEW_TYPES
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 124], //VIEW_ROLES
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 125], //EDIT_LOG
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 126], //DELETE_LOG
            ['tenant_id' => 1, 'role_id' => 1, 'right_id' => 127], //VIEW_INTEGRATIONS

            //Administrator

            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 1], //ACCESS
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 2], //ACCESS_API
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 3], //ACCESS_ADMIN
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 4], //ACCESS_SETTING
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 5], //VIEW_PROFILE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 6], //EDIT_PROFILE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 7], //EDIT_TYPES
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 8], //EDIT_ROLES
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 9], //VIEW_LOG
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 10], //CREATE_INC
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 11], //ASSIGN_INC
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 12], //EDIT_INC
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 13], //VIEW_INC
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 14], //CLOSE_INC
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 15], //REOPEN_INC
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 16], //DELETE_INC
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 17], //IMPORT_INC
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 18], //EXPORT_INC
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 19], //CREATE_INCTYPE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 20], //EDIT_INCTYPE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 21], //DELETE_INCTYPE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 22], //IMPORT_INCTYPE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 23], //EXPORT_INCTYPE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 24], //CREATE_USER
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 25], //EDIT_USER
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 26], //VIEW_USER
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 27], //DELETE_USER
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 28], //IMPORT_USER
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 29], //EXPORT_USER
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 30], //CREATE_USERSETTING
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 31], //EDIT_USERSETTING
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 32], //DELETE_USERSETTING
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 33], //IMPORT_USERSETTING
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 34], //EXPORT_USERSETTING
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 35], //VIEW_ROLE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 36], //EDIT_ROLE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 37], //CREATE_ROLE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 38], //DELETE_ROLE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 39], //IMPORT_ROLE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 40], //EXPORT_ROLE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 47], //VIEW_ORG
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 48], //CREATE_ORG
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 49], //EDIT_ORG
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 50], //DELETE_ORG
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 51], //IMPORT_ORG
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 52], //EXPORT_ORG
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 53], //CREATE_ORGTYPE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 54], //EDIT_ORGTYPE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 55], //DELETE_ORGTYPE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 56], //IMPORT_ORGTYPE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 57], //EXPORT_ORGTYPE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 58], //VIEW_CONTACT
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 59], //CREATE_CONTACT
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 60], //EDIT_CONTACT
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 61], //DELETE_CONTACT
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 62], //IMPORT_CONTACT
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 63], //EXPORT_CONTACT
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 64], //CREATE_CONTACTTYPE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 65], //EDIT_CONTACTTYPE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 66], //DELETE_CONTACTTYPE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 67], //IMPORT_CONTACTTYPE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 68], //EXPORT_CONTACTTYPE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 69], //VIEW_SUB
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 70], //CREATE_SUB
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 71], //EDIT_SUB
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 72], //DELETE_SUB
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 73], //IMPORT_SUB
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 74], //EXPORT_SUB
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 75], //CREATE_SUBTYPE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 76], //EDIT_SUBTYPE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 77], //DELETE_SUBTYPE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 78], //IMPORT_SUBTYPE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 79], //EXPORT_SUBTYPE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 80], //VIEW_BRAND
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 81], //CREATE_BRAND
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 82], //EDIT_BRAND
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 83], //DELETE_BRAND
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 84], //IMPORT_BRAND
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 85], //EXPORT_BRAND
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 86], //VIEW_PROD
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 87], //CREATE_PROD
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 88], //EDIT_PROD
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 89], //DELETE_PROD
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 90], //IMPORT_PROD
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 91], //EXPORT_PROD
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 92], //CREATE_PRODTYPE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 93], //EDIT_PRODTYPE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 94], //DELETE_PRODTYPE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 95], //IMPORT_PRODTYPE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 96], //EXPORT_PRODTYPE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 97], //VIEW_ALERT
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 98], //ACK_ALERT
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 99], //EDIT_ALERT
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 100], //DELETE_ALERT
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 101], //EXPORT_ALERT
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 102], //CREATE_ALERTTYPE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 103], //EDIT_ALERTTYPE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 104], //DELETE_ALERTTYPE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 105], //IMPORT_ALERTTYPE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 106], //EXPORT_ALERTTYPE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 107], //VIEW_DEVICE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 108], //CREATE_DEVICE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 109], //EDIT_DEVICE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 110], //DELETE_DEVICE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 111], //IMPORT_DEVICE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 112], //EXPORT_DEVICE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 113], //CREATE_DEVICETYPE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 114], //EDIT_DEVICETYPE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 115], //DELETE_DEVICETYPE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 116], //IMPORT_DEVICETYPE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 117], //EXPORT_DEVICETYPE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 118], //CREATE_ALERTRULE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 119], //EDIT_ALERTRULE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 120], //DELETE_ALERTRULE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 121], //IMPORT_ALERTRULE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 122], //EXPORT_ALERTRULE
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 123], //VIEW_TYPES
            ['tenant_id' => 1, 'role_id' => 2, 'right_id' => 124], //VIEW_ROLES

            //Operator

            ['tenant_id' => 1, 'role_id' => 3, 'right_id' => 1], //ACCESS
            ['tenant_id' => 1, 'role_id' => 3, 'right_id' => 4], //ACCESS_SETTING
            ['tenant_id' => 1, 'role_id' => 3, 'right_id' => 5], //VIEW_PROFILE
            ['tenant_id' => 1, 'role_id' => 3, 'right_id' => 6], //EDIT_PROFILE
            ['tenant_id' => 1, 'role_id' => 3, 'right_id' => 9], //VIEW_LOG
            ['tenant_id' => 1, 'role_id' => 3, 'right_id' => 10], //CREATE_INC
            ['tenant_id' => 1, 'role_id' => 3, 'right_id' => 12], //EDIT_INC
            ['tenant_id' => 1, 'role_id' => 3, 'right_id' => 13], //VIEW_INC
            ['tenant_id' => 1, 'role_id' => 3, 'right_id' => 14], //CLOSE_INC
            ['tenant_id' => 1, 'role_id' => 3, 'right_id' => 15], //REOPEN_INC
            ['tenant_id' => 1, 'role_id' => 3, 'right_id' => 16], //DELETE_INC
            ['tenant_id' => 1, 'role_id' => 3, 'right_id' => 17], //IMPORT_INC
            ['tenant_id' => 1, 'role_id' => 3, 'right_id' => 18], //EXPORT_INC
            ['tenant_id' => 1, 'role_id' => 3, 'right_id' => 69], //VIEW_SUB
            ['tenant_id' => 1, 'role_id' => 3, 'right_id' => 80], //VIEW_BRAND
            ['tenant_id' => 1, 'role_id' => 3, 'right_id' => 97], //VIEW_ALERT
            ['tenant_id' => 1, 'role_id' => 3, 'right_id' => 98], //ACK_ALERT
            ['tenant_id' => 1, 'role_id' => 3, 'right_id' => 99], //EDIT_ALERT
            ['tenant_id' => 1, 'role_id' => 3, 'right_id' => 107], //VIEW_DEVICE
            ['tenant_id' => 1, 'role_id' => 3, 'right_id' => 108], //CREATE_DEVICE
            ['tenant_id' => 1, 'role_id' => 3, 'right_id' => 109], //EDIT_DEVICE

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('right_role');
    }
};
