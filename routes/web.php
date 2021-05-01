<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');

Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::post('/password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reste', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/reste', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('/password/reste/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {

    Route::resource('publicadministrations', App\Http\Controllers\PublicAdministrationController::class);

    Route::resource('administrations', App\Http\Controllers\AdministrationController::class);

    Route::resource('branches', App\Http\Controllers\BranchController::class);

    Route::resource('departments', App\Http\Controllers\DepartmentController::class);

    Route::resource('users', App\Http\Controllers\UserController::class);

});




// Route::resource('/permissions', 'PermissionsController', ['as' => 'laratrust'])
//     ->only(['index', 'edit', 'update']);

// Route::resource('/roles', 'RolesController', ['as' => 'laratrust']);

// Route::resource('/roles-assignment', 'RolesAssignmentController', ['as' => 'laratrust'])
//     ->only(['index', 'edit', 'update']);
