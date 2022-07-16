<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('admin', [LoginController::class, 'index']);
Route::get('admin-dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');



// permission routes
Route::get('admin-permission', [PermissionController::class, 'index'])->name('admin.permission.index');
Route::get('all-permissions', [PermissionController::class, 'allPermissions']);
Route::post('admin-permission-store', [PermissionController::class, 'store'])->name('admin.permission.store');
Route::get('admin-permission-delete/{id}', [PermissionController::class, 'delete'])->name('admin.permission.delete');




// role routes
Route::get('admin-role', [RoleController::class, 'index'])->name('admin.role.index');
Route::get('all-roles', [RoleController::class, 'allRoles']);
Route::post('admin-role-store', [RoleController::class, 'store'])->name('admin.role.store');
Route::get('role-status-update/{id}', [RoleController::class, 'statusUpdate']);
Route::get('role-delete/{id}', [RoleController::class, 'statusDelete']);



// Admin user routes
Route::get('admin-user', [UserController::class, 'index'])->name('admin.users.index');
Route::post('admin-user-store', [UserController::class, 'store'])->name('admin.users.store');
