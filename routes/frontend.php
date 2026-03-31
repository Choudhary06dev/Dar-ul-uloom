<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;

use App\Http\Controllers\Frontend\AdmissionController;
use App\Http\Controllers\Frontend\Auth\LoginController;
use App\Http\Controllers\Frontend\Auth\RegisterController;

use App\Http\Controllers\Frontend\ProfileController;

Route::prefix('/')->name('frontend.')->group(function () {
    Route::get('/', [FrontendController::class, 'index'])->name('index');
    Route::get('/about', [FrontendController::class, 'about'])->name('about');
    Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
    Route::get('/blog/details', [FrontendController::class, 'blogDetails'])->name('blog.details');
    Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
    Route::get('/career', [FrontendController::class, 'career'])->name('career');
    
    Route::get('/admission', [AdmissionController::class, 'create'])->name('admission.create');
    Route::post('/admission', [AdmissionController::class, 'store'])->name('admission.store');

    // Profile routes (frontend namespace)
    Route::middleware('auth:web')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    });
});

// Frontend Authentication (public routes without frontend route name prefix)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
});

Route::middleware('auth:web')->group(function () {
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});
