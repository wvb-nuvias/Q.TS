<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Dashboard;
use App\Livewire\Dashboards\Alerts as Dashboard_Alerts;
use App\Livewire\Dashboards\Incidents as Dashboard_Incidents;
use App\Livewire\Dashboards\Devices as Dashboard_Devices;
use App\Livewire\Dashboards\Subscriptions as Dashboard_Subscriptions;
use App\Livewire\UserManagement;
use App\Livewire\UserProfile;
use App\Livewire\Subscriptions;
use App\Livewire\Organizations;
use App\Livewire\Contacts;
use App\Livewire\Incidents;
use App\Livewire\Devices;
use App\Livewire\Alerts;
use App\Livewire\RoleManagement;
use App\Livewire\TypeManagement;
use App\Livewire\TenantManagement;
use App\Livewire\ProductManagement;
use App\Livewire\Svg\WatchguardIcon;

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
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('dashboards/alerts', Dashboard_Alerts::class)->name('dashboard_alerts');
    Route::get('dashboards/devices', Dashboard_Devices::class)->name('dashboard_devices');
    Route::get('dashboards/incidents', Dashboard_Incidents::class)->name('dashboard_incidents');
    Route::get('dashboards/subscriptions', Dashboard_Subscriptions::class)->name('dashboard_subscriptions');

    Route::get('incidents', Incidents::class)->name('incidents');
    Route::get('subscriptions', Subscriptions::class)->name('subscriptions');
    Route::get('organizations', Organizations::class)->name('organizations');
    Route::get('contacts', Contacts::class)->name('contacts');
    Route::get('devices', Devices::class)->name('devices');
    Route::get('alerts', Alerts::class)->name('alerts');

    Route::get('user-profile', UserProfile::class)->middleware('auth')->name('user-profile');
    Route::get('user-management', UserManagement::class)->middleware('auth')->name('user-management');
    Route::get('type-management', TypeManagement::class)->middleware('auth')->name('type-management');
    Route::get('role-management', RoleManagement::class)->middleware('auth')->name('role-management');
    Route::get('product-management', ProductManagement::class)->middleware('auth')->name('product-management');

    Route::get('tenant-management', TenantManagement::class)->middleware('auth')->name('tenant-management');

});
