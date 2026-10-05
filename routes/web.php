<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\ContactController;
use App\Http\Middleware\EnsureAdminAuthenticated;
use App\Http\Middleware\EnsureSuperAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', [ContactController::class, 'index'])->name('home');
Route::view('/about', 'pages.about')->name('about');
Route::view('/services', 'pages.services')->name('services');
Route::view('/standards', 'pages.standards')->name('standards');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/privacy', 'pages.privacy')->name('privacy');
Route::view('/terms', 'pages.terms')->name('terms');
Route::post('/contact', [ContactController::class, 'submit'])->middleware('throttle:5,10')->name('contact.submit');

Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->middleware('throttle:5,1')->name('admin.login.submit');

Route::middleware(EnsureAdminAuthenticated::class)->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::middleware(EnsureSuperAdmin::class)->group(function () {
        Route::delete('/admin/inquiries/{inquiry}', [AdminController::class, 'destroy'])->name('admin.inquiries.destroy');

        Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
        Route::post('/admin/users', [AdminUserController::class, 'store'])->name('admin.users.store');
        Route::patch('/admin/users/{user}/password', [AdminUserController::class, 'updatePassword'])->name('admin.users.password');
        Route::patch('/admin/users/{user}/role', [AdminUserController::class, 'updateRole'])->name('admin.users.role');
        Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
    });
});
