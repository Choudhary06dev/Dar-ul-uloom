<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\AdminController;


// Include Frontend Routes
require __DIR__ . '/frontend.php';


// Admin Routes with Authentication
Route::prefix('admin')->name('admin.')->middleware(['auth:admin', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin specific routes
    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/users/{user}', [AdminController::class, 'showUser'])->name('users.show');
    Route::get('/users/{user}/edit', [AdminController::class, 'editUser'])->name('users.edit');
    Route::patch('/users/{user}', [AdminController::class, 'updateUser'])->name('users.update');
    Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])->name('users.destroy');

    // Admission Routes
    Route::get('/admissions', [\App\Http\Controllers\Admin\AdmissionController::class, 'index'])->name('admissions.index');
    Route::get('/admissions/{admission}/edit', [\App\Http\Controllers\Admin\AdmissionController::class, 'edit'])->name('admissions.edit');
    Route::put('/admissions/{admission}', [\App\Http\Controllers\Admin\AdmissionController::class, 'update'])->name('admissions.update');
});


require __DIR__.'/auth.php';
