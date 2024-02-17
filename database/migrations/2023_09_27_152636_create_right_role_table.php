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
        Schema::create('right_role', function (Blueprint $table) {
            $table->id();
            $table->integer('tenantid');
            $table->timestamps();
            $table->integer('role_id')->nullable();
            $table->integer('right_id')->nullable();
        });

        DB::table('right_role')->insert([
            //Tenant Administrator

            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 1], //ACCESS
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 2], //ACCESS_API
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 3], //ACCESS_ADMIN
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 4], //ACCESS_SETTING
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 5], //VIEW_PROFILE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 6], //EDIT_PROFILE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 7], //EDIT_TYPES
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 8], //EDIT_ROLES
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 9], //VIEW_LOG
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 10], //CREATE_INC
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 11], //ASSIGN_INC
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 12], //EDIT_INC
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 13], //VIEW_INC
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 14], //CLOSE_INC
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 15], //REOPEN_INC
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 16], //DELETE_INC
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 17], //IMPORT_INC
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 18], //EXPORT_INC
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 19], //CREATE_INCTYPE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 20], //EDIT_INCTYPE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 21], //DELETE_INCTYPE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 22], //IMPORT_INCTYPE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 23], //EXPORT_INCTYPE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 24], //CREATE_USER
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 25], //EDIT_USER
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 26], //VIEW_USER
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 27], //DELETE_USER
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 28], //IMPORT_USER
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 29], //EXPORT_USER
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 30], //CREATE_USERSETTING
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 31], //EDIT_USERSETTING
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 32], //DELETE_USERSETTING
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 33], //IMPORT_USERSETTING
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 34], //EXPORT_USERSETTING
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 35], //VIEW_ROLE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 36], //EDIT_ROLE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 37], //CREATE_ROLE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 38], //DELETE_ROLE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 39], //IMPORT_ROLE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 40], //EXPORT_ROLE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 41], //CREATE_TENANT
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 42], //VIEW_TENANT
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 43], //EDIT_TENANT
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 44], //DELETE_TENANT
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 45], //IMPORT_TENANT
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 46], //EXPORT_TENANT
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 47], //VIEW_ORG
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 48], //CREATE_ORG
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 49], //EDIT_ORG
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 50], //DELETE_ORG
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 51], //IMPORT_ORG
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 52], //EXPORT_ORG
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 53], //CREATE_ORGTYPE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 54], //EDIT_ORGTYPE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 55], //DELETE_ORGTYPE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 56], //IMPORT_ORGTYPE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 57], //EXPORT_ORGTYPE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 58], //VIEW_CONTACT
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 59], //CREATE_CONTACT
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 60], //EDIT_CONTACT
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 61], //DELETE_CONTACT
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 62], //IMPORT_CONTACT
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 63], //EXPORT_CONTACT
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 64], //CREATE_CONTACTTYPE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 65], //EDIT_CONTACTTYPE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 66], //DELETE_CONTACTTYPE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 67], //IMPORT_CONTACTTYPE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 68], //EXPORT_CONTACTTYPE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 69], //VIEW_SUB
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 70], //CREATE_SUB
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 71], //EDIT_SUB
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 72], //DELETE_SUB
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 73], //IMPORT_SUB
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 74], //EXPORT_SUB
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 75], //CREATE_SUBTYPE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 76], //EDIT_SUBTYPE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 77], //DELETE_SUBTYPE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 78], //IMPORT_SUBTYPE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 79], //EXPORT_SUBTYPE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 80], //VIEW_BRAND
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 81], //CREATE_BRAND
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 82], //EDIT_BRAND
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 83], //DELETE_BRAND
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 84], //IMPORT_BRAND
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 85], //EXPORT_BRAND
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 86], //VIEW_PROD
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 87], //CREATE_PROD
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 88], //EDIT_PROD
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 89], //DELETE_PROD
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 90], //IMPORT_PROD
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 91], //EXPORT_PROD
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 92], //CREATE_PRODTYPE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 93], //EDIT_PRODTYPE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 94], //DELETE_PRODTYPE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 95], //IMPORT_PRODTYPE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 96], //EXPORT_PRODTYPE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 97], //VIEW_ALERT
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 98], //ACK_ALERT
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 99], //EDIT_ALERT
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 100], //DELETE_ALERT
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 101], //EXPORT_ALERT
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 102], //CREATE_ALERTTYPE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 103], //EDIT_ALERTTYPE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 104], //DELETE_ALERTTYPE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 105], //IMPORT_ALERTTYPE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 106], //EXPORT_ALERTTYPE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 107], //VIEW_DEVICE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 108], //CREATE_DEVICE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 109], //EDIT_DEVICE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 110], //DELETE_DEVICE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 111], //IMPORT_DEVICE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 112], //EXPORT_DEVICE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 113], //CREATE_DEVICETYPE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 114], //EDIT_DEVICETYPE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 115], //DELETE_DEVICETYPE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 116], //IMPORT_DEVICETYPE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 117], //EXPORT_DEVICETYPE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 118], //CREATE_ALERTRULE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 119], //EDIT_ALERTRULE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 120], //DELETE_ALERTRULE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 121], //IMPORT_ALERTRULE
            ['tenantid' => 1, 'role_id' => 1, 'right_id' => 122], //EXPORT_ALERTRULE

            //Administrator

            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 1], //ACCESS
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 2], //ACCESS_API
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 3], //ACCESS_ADMIN
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 4], //ACCESS_SETTING
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 5], //VIEW_PROFILE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 6], //EDIT_PROFILE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 7], //EDIT_TYPES
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 8], //EDIT_ROLES
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 9], //VIEW_LOG
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 10], //CREATE_INC
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 11], //ASSIGN_INC
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 12], //EDIT_INC
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 13], //VIEW_INC
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 14], //CLOSE_INC
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 15], //REOPEN_INC
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 16], //DELETE_INC
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 17], //IMPORT_INC
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 18], //EXPORT_INC
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 19], //CREATE_INCTYPE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 20], //EDIT_INCTYPE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 21], //DELETE_INCTYPE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 22], //IMPORT_INCTYPE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 23], //EXPORT_INCTYPE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 24], //CREATE_USER
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 25], //EDIT_USER
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 26], //VIEW_USER
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 27], //DELETE_USER
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 28], //IMPORT_USER
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 29], //EXPORT_USER
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 30], //CREATE_USERSETTING
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 31], //EDIT_USERSETTING
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 32], //DELETE_USERSETTING
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 33], //IMPORT_USERSETTING
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 34], //EXPORT_USERSETTING
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 35], //VIEW_ROLE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 36], //EDIT_ROLE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 37], //CREATE_ROLE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 38], //DELETE_ROLE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 39], //IMPORT_ROLE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 40], //EXPORT_ROLE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 47], //VIEW_ORG
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 48], //CREATE_ORG
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 49], //EDIT_ORG
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 50], //DELETE_ORG
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 51], //IMPORT_ORG
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 52], //EXPORT_ORG
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 53], //CREATE_ORGTYPE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 54], //EDIT_ORGTYPE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 55], //DELETE_ORGTYPE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 56], //IMPORT_ORGTYPE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 57], //EXPORT_ORGTYPE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 58], //VIEW_CONTACT
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 59], //CREATE_CONTACT
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 60], //EDIT_CONTACT
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 61], //DELETE_CONTACT
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 62], //IMPORT_CONTACT
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 63], //EXPORT_CONTACT
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 64], //CREATE_CONTACTTYPE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 65], //EDIT_CONTACTTYPE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 66], //DELETE_CONTACTTYPE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 67], //IMPORT_CONTACTTYPE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 68], //EXPORT_CONTACTTYPE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 69], //VIEW_SUB
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 70], //CREATE_SUB
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 71], //EDIT_SUB
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 72], //DELETE_SUB
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 73], //IMPORT_SUB
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 74], //EXPORT_SUB
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 75], //CREATE_SUBTYPE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 76], //EDIT_SUBTYPE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 77], //DELETE_SUBTYPE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 78], //IMPORT_SUBTYPE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 79], //EXPORT_SUBTYPE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 80], //VIEW_BRAND
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 81], //CREATE_BRAND
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 82], //EDIT_BRAND
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 83], //DELETE_BRAND
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 84], //IMPORT_BRAND
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 85], //EXPORT_BRAND
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 86], //VIEW_PROD
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 87], //CREATE_PROD
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 88], //EDIT_PROD
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 89], //DELETE_PROD
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 90], //IMPORT_PROD
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 91], //EXPORT_PROD
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 92], //CREATE_PRODTYPE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 93], //EDIT_PRODTYPE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 94], //DELETE_PRODTYPE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 95], //IMPORT_PRODTYPE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 96], //EXPORT_PRODTYPE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 97], //VIEW_ALERT
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 98], //ACK_ALERT
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 99], //EDIT_ALERT
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 100], //DELETE_ALERT
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 101], //EXPORT_ALERT
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 102], //CREATE_ALERTTYPE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 103], //EDIT_ALERTTYPE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 104], //DELETE_ALERTTYPE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 105], //IMPORT_ALERTTYPE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 106], //EXPORT_ALERTTYPE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 107], //VIEW_DEVICE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 108], //CREATE_DEVICE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 109], //EDIT_DEVICE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 110], //DELETE_DEVICE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 111], //IMPORT_DEVICE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 112], //EXPORT_DEVICE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 113], //CREATE_DEVICETYPE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 114], //EDIT_DEVICETYPE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 115], //DELETE_DEVICETYPE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 116], //IMPORT_DEVICETYPE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 117], //EXPORT_DEVICETYPE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 118], //CREATE_ALERTRULE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 119], //EDIT_ALERTRULE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 120], //DELETE_ALERTRULE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 121], //IMPORT_ALERTRULE
            ['tenantid' => 1, 'role_id' => 2, 'right_id' => 122], //EXPORT_ALERTRULE

            //Operator

            ['tenantid' => 1, 'role_id' => 3, 'right_id' => 1], //ACCESS
            ['tenantid' => 1, 'role_id' => 3, 'right_id' => 4], //ACCESS_SETTING
            ['tenantid' => 1, 'role_id' => 3, 'right_id' => 5], //VIEW_PROFILE
            ['tenantid' => 1, 'role_id' => 3, 'right_id' => 6], //EDIT_PROFILE
            ['tenantid' => 1, 'role_id' => 3, 'right_id' => 9], //VIEW_LOG
            ['tenantid' => 1, 'role_id' => 3, 'right_id' => 10], //CREATE_INC
            ['tenantid' => 1, 'role_id' => 3, 'right_id' => 12], //EDIT_INC
            ['tenantid' => 1, 'role_id' => 3, 'right_id' => 13], //VIEW_INC
            ['tenantid' => 1, 'role_id' => 3, 'right_id' => 14], //CLOSE_INC
            ['tenantid' => 1, 'role_id' => 3, 'right_id' => 15], //REOPEN_INC
            ['tenantid' => 1, 'role_id' => 3, 'right_id' => 16], //DELETE_INC
            ['tenantid' => 1, 'role_id' => 3, 'right_id' => 17], //IMPORT_INC
            ['tenantid' => 1, 'role_id' => 3, 'right_id' => 18], //EXPORT_INC
            ['tenantid' => 1, 'role_id' => 3, 'right_id' => 80], //VIEW_BRAND
            ['tenantid' => 1, 'role_id' => 3, 'right_id' => 97], //VIEW_ALERT
            ['tenantid' => 1, 'role_id' => 3, 'right_id' => 98], //ACK_ALERT
            ['tenantid' => 1, 'role_id' => 3, 'right_id' => 99], //EDIT_ALERT
            ['tenantid' => 1, 'role_id' => 3, 'right_id' => 107], //VIEW_DEVICE
            ['tenantid' => 1, 'role_id' => 3, 'right_id' => 108], //CREATE_DEVICE
            ['tenantid' => 1, 'role_id' => 3, 'right_id' => 109], //EDIT_DEVICE

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
