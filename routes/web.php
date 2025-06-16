<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backoffice\BackofficeController;

use App\Http\Controllers\Backoffice\Usermanagement\AdminUserController;
use App\Http\Controllers\Backoffice\Usermanagement\PermissionController;
use App\Http\Controllers\Backoffice\Usermanagement\RoleController;
use App\Http\Controllers\Backoffice\Usermanagement\RolePermissionController;

use App\Http\Controllers\BackofficeAuth\BackofficeLoginController;
use App\Http\Controllers\BackofficeAuth\BackofficeLogoutController;
use App\Http\Controllers\BackofficeAuth\BackofficeRestPasswordController;

use App\Http\Controllers\BackofficeUser\BackofficeChangePasswordController;
use App\Http\Controllers\BackofficeUser\BackofficeProfileController;

use App\Http\Middleware\RedirectIfAuthenticatedCustom;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Backoffice Group Middleware 
Route::middleware(['auth', 'role:admin'])
    ->prefix('/backoffice')
    ->group(function () {
        Route::get('/dashboard', [BackofficeController::class, 'backofficeDashboard'])->name('backoffice.dashboard');
        Route::get('/logout', [BackofficeLogoutController::class, 'backofficeLogout'])->name('backoffice.logout');
        // Backoffice User manage profile data
        Route::get('/profile', [BackofficeProfileController::class, 'backofficeProfile'])->name('backoffice.profile');
        Route::post('/profile/store', [BackofficeProfileController::class, 'backofficeProfileStore'])->name('backoffice.profile.store');
        // Backoffice User update password
        Route::get('/change/password', [BackofficeChangePasswordController::class, 'backofficeChangePassword'])->name('backoffice.change.password');
        Route::post('/password/update', [BackofficeChangePasswordController::class, 'backofficePasswordUpdate'])->name('backoffice.password.update');

        /// Permission All Route 
        Route::prefix('/permission')
            ->controller(PermissionController::class)
            ->group(function () {
                Route::get('/', 'index')->name('permission.index')->middleware('permission:permission.all');
                Route::get('/create', 'create')->name('permission.create')->middleware('permission:permission.add');
                Route::post('/', 'store')->name('permission.store')->middleware('permission:permission.add');
                Route::get('/edit/{id}', 'edit')->name('permission.edit')->middleware('permission:permission.edit');
                Route::post('/update', 'update')->name('permission.update')->middleware('permission:permission.edit');
                Route::get('/delete/{id}', 'destroy')->name('permission.destroy')->middleware('permission:permission.delete');
                // Import Export Permission
                Route::get('/import', 'ImportPermission')->name('import.permission')->middleware('permission:permission.import');
                Route::get('/export', 'export')->name('export')->middleware('permission:permission.export');
                Route::post('/import', 'Import')->name('import')->middleware('permission:permission.import');
            });

        /// Role All Route 
        Route::prefix('/roles')
            ->controller(RoleController::class)
            ->group(function () {
                Route::get('/', 'index')->name('roles.index')->middleware('permission:roles.all');
                Route::get('/create', 'create')->name('roles.create')->middleware('permission:roles.add');
                Route::post('/', 'store')->name('roles.store')->middleware('permission:roles.add');
                Route::get('/edit/{id}', 'edit')->name('roles.edit')->middleware('permission:roles.edit');
                Route::post('/update', 'update')->name('roles.update')->middleware('permission:roles.edit');
                Route::get('/delete/{id}', 'destroy')->name('roles.destroy')->middleware('permission:roles.delete');
            });

        // Roles Permission All Route 
        Route::prefix('/roles/permission')
            ->controller(RolePermissionController::class)
            ->group(function () {
                Route::get('/', 'index')->name('roles.permission.index');
                Route::get('/create', 'create')->name('roles.permission.create')->middleware('permission:role.permission.add');
                Route::post('/', 'store')->name('roles.permission.store')->middleware('permission:role.permission.add');
                Route::get('/edit/{id}', 'edit')->name('roles.permission.edit');
                Route::post('/update/{id}', 'update')->name('roles.permission.update');
                Route::get('/delete/{id}', 'destroy')->name('roles.permission.destroy')->middleware('permission:role.permission.delete');
            });

        // Admin User All Route 
        Route::prefix('/adminuser')
            ->controller(AdminUserController::class)->group(function () {
                Route::get('/', 'index')->name('adminuser.index')->middleware('permission:user.management.all');
                Route::get('/create', 'create')->name('adminuser.create')->middleware('permission:user.management.add');
                Route::post('/', 'store')->name('adminuser.store')->middleware('permission:user.management.add');
                Route::get('/edit/{id}', 'edit')->name('adminuser.edit')->middleware('permission:user.management.edit');
                Route::post('/update/{id}', 'update')->name('adminuser.update')->middleware('permission:user.management.edit');
                Route::get('/delete/{id}', 'destroy')->name('adminuser.destroy')->middleware('permission:user.management.delete');
            });
    }); // End Group Backoffice Middleware

// Route Accessable for All 
Route::get('/backoffice/login', [BackofficeLoginController::class, 'backofficeLogin'])->name('backoffice.login')->middleware(RedirectIfAuthenticatedCustom::class);
Route::get('/backoffice/forget', [BackofficeRestPasswordController::class, 'backofficeForgetPassword'])->name('backoffice.password.request')->middleware(RedirectIfAuthenticatedCustom::class);
Route::get('/backoffice/reset-password/{token}', [BackofficeRestPasswordController::class, 'backofficeResetPassword'])->name('backoffice.password.reset')->middleware(RedirectIfAuthenticatedCustom::class);

require __DIR__ . '/auth.php';
