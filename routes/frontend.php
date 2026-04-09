<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;

use App\Http\Controllers\Frontend\AdmissionController;
use App\Http\Controllers\Frontend\Auth\LoginController;
use App\Http\Controllers\Frontend\Auth\RegisterController;

use App\Http\Controllers\Frontend\ProfileController;

use App\Http\Controllers\Frontend\ContactController;

Route::prefix('/')->name('frontend.')->group(function () {
    Route::get('/', [FrontendController::class, 'index'])->name('index');
    Route::get('/about', [FrontendController::class, 'about'])->name('about');
    Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
    Route::get('/blog/details', [FrontendController::class, 'blogDetails'])->name('blog.details');
    Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
    


    // Profile routes (frontend namespace)
    Route::middleware('auth:student,web')->group(function () {
        Route::get('/admission', [AdmissionController::class, 'create'])->name('admission.create');
        Route::post('/admission', [AdmissionController::class, 'store'])->name('admission.store');
        Route::put('/admission/{admission}', [AdmissionController::class, 'studentUpdate'])->name('admission.update');
        
        Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('profile.dashboard');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::patch('/profile/image', [ProfileController::class, 'updateImage'])->name('profile.image');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    });

    // Management Routes (Access restricted to admins)
    Route::middleware('auth:web')->group(function () {
        Route::get('/management/admissions', [AdmissionController::class, 'managementIndex'])->name('management.admissions.index');
        Route::get('/management/admissions/{admission}', [AdmissionController::class, 'managementShow'])->name('management.admissions.show');
        Route::put('/management/admissions/{admission}', [AdmissionController::class, 'managementUpdate'])->name('management.admissions.update');
    });

    // Printing
    Route::middleware('auth:student,web')->group(function () {
        Route::get('/admissions/{admission}/print', [AdmissionController::class, 'print'])->name('admission.print');
    });
});

// Frontend Authentication (public routes without frontend route name prefix)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
});

Route::middleware('auth:student,web')->group(function () {
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});
