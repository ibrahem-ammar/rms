<?php

use Illuminate\Support\Facades\Route;

// Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');

// Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

// Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Route::post('/password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
// Route::get('/password/reste', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
// Route::post('/password/reste', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

// Route::get('/password/reste/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');

Auth::routes();

Route::get('/home/users/help/watch', function(){
    return view('layouts.app');
})->name('home');

Route::middleware(['auth'])->group(function () {
    Route::post('statuses/search', [App\Http\Controllers\StatusController::class,'search'])->name('statuses.search');

    Route::post('types/search', [App\Http\Controllers\TypeController::class,'search'])->name('types.search');

    Route::post('administrations/search', [App\Http\Controllers\AdministrationController::class,'search'])->name('administrations.search');

    Route::post('departments/search', [App\Http\Controllers\DepartmentController::class,'search'])->name('departments.search');

    Route::post('users/search', [App\Http\Controllers\UserController::class,'search'])->name('users.search');

    Route::resource('publicadministrations', App\Http\Controllers\PublicAdministrationController::class);

    Route::resource('administrations', App\Http\Controllers\AdministrationController::class);

    Route::resource('branches', App\Http\Controllers\BranchController::class);

    Route::resource('departments', App\Http\Controllers\DepartmentController::class);

    Route::resource('users', App\Http\Controllers\UserController::class);

    Route::resource('tasks', App\Http\Controllers\TaskController::class);

    Route::resource('types', App\Http\Controllers\TypeController::class);

    Route::resource('statuses', App\Http\Controllers\StatusController::class);



    Route::resource('reports', App\Http\Controllers\ReportController::class);

    Route::resource('permissions', App\Http\Controllers\PermissionController::class);

    Route::get('logs',[App\Http\Controllers\LogController::class,'index'])->name('logs');

});




// Route::resource('/permissions', 'PermissionsController', ['as' => 'laratrust'])
//     ->only(['index', 'edit', 'update']);

// Route::resource('/roles', 'RolesController', ['as' => 'laratrust']);

// Route::resource('/roles-assignment', 'RolesAssignmentController', ['as' => 'laratrust'])
//     ->only(['index', 'edit', 'update']);
