<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Dashboards\Overview as Dashboard_Overview;
use App\Livewire\Dashboards\Alerts as Dashboard_Alerts;
use App\Livewire\Dashboards\Incidents as Dashboard_Incidents;
use App\Livewire\Dashboards\Devices as Dashboard_Devices;
use App\Livewire\Dashboards\Subscriptions as Dashboard_Subscriptions;
use App\Livewire\Integrations\Integrations;
use App\Livewire\Subscriptions\Subscriptions;
use App\Livewire\Organizations\Organizations;
use App\Livewire\Contacts\Contacts;
use App\Livewire\Incidents\Incidents;
use App\Livewire\Devices\Devices;
use App\Livewire\Alerts\Alerts;
use App\Livewire\Profiles\UserProfile;
use App\Livewire\Admins\UserManagement;
use App\Livewire\Admins\RoleManagement;
use App\Livewire\Admins\TypeManagement;
use App\Livewire\Admins\ProductManagement;
use App\Livewire\Admins\TenantManagement;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('dashboards/overview', Dashboard_Overview::class)->name('dashboard_overview');
    Route::get('dashboards/alerts', Dashboard_Alerts::class)->name('dashboard_alerts');
    Route::get('dashboards/devices', Dashboard_Devices::class)->name('dashboard_devices');
    Route::get('dashboards/incidents', Dashboard_Incidents::class)->name('dashboard_incidents');
    Route::get('dashboards/subscriptions', Dashboard_Subscriptions::class)->name('dashboard_subscriptions');

    Route::get('organizations', Organizations::class)->name('organizations');
    Route::get('contacts', Contacts::class)->name('contacts');
    Route::get('subscriptions', Subscriptions::class)->name('subscriptions');
    Route::get('incidents', Incidents::class)->name('incidents');
    Route::get('devices', Devices::class)->name('devices');
    Route::get('alerts', Alerts::class)->name('alerts');
    Route::get('integrations', Integrations::class)->name('integrations');

    Route::get('user-profile', UserProfile::class)->middleware('auth')->name('user-profile');
    Route::get('user-management', UserManagement::class)->middleware('auth')->name('user-management');
    Route::get('role-management', RoleManagement::class)->middleware('auth')->name('role-management');
    Route::get('type-management', TypeManagement::class)->middleware('auth')->name('type-management');
    Route::get('product-management', ProductManagement::class)->middleware('auth')->name('product-management');

    Route::get('tenant-management', TenantManagement::class)->middleware('auth')->name('tenant-management');

});
