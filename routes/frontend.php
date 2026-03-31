<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;

use App\Http\Controllers\Frontend\AdmissionController;

Route::prefix('/')->name('frontend.')->group(function () {
    Route::get('/', [FrontendController::class, 'index'])->name('index');
    Route::get('/about', [FrontendController::class, 'about'])->name('about');
    Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
    Route::get('/blog/details', [FrontendController::class, 'blogDetails'])->name('blog.details');
    Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
    
    Route::get('/admission', [AdmissionController::class, 'create'])->name('admission.create');
    Route::post('/admission', [AdmissionController::class, 'store'])->name('admission.store');
});
