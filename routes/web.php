<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Dashboard;
use App\Livewire\UserManagement;
use App\Livewire\UserProfile;
use App\Livewire\Subscriptions;
use App\Livewire\Incidents;
use App\Livewire\Devices;
use App\Livewire\RoleManagement;
use App\Livewire\TenantManagement;
use App\Livewire\ProductManagement;


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

    Route::get('incidents', Incidents::class)->name('incidents');
    Route::get('subscriptions', Subscriptions::class)->name('subscriptions');
    Route::get('devices', Devices::class)->name('devices');

    Route::get('user-profile', UserProfile::class)->middleware('auth')->name('user-profile');
    Route::get('user-management', UserManagement::class)->middleware('auth')->name('user-management');

    Route::get('tenant-management', TenantManagement::class)->middleware('auth')->name('tenant-management');
    Route::get('role-management', RoleManagement::class)->middleware('auth')->name('role-management');
    Route::get('product-management', ProductManagement::class)->middleware('auth')->name('product-management');
});
