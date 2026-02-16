<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HeroSectionController;
use App\Http\Controllers\Admin\AboutSectionController;
use App\Http\Controllers\Admin\WhatWeDoSectionController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PortfolioWorkController;
use App\Http\Controllers\Admin\ContactInfoController;
use App\Http\Controllers\Admin\ContactMessageController;

Route::get('/', [LandingPageController::class, 'index'])->name('landing');
Route::post('/contact', [LandingPageController::class, 'submitContact'])->name('contact.submit');

Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login'])->name('admin.login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        Route::get('/hero', [HeroSectionController::class, 'index'])->name('admin.hero.index');
        Route::put('/hero/{id}', [HeroSectionController::class, 'update'])->name('admin.hero.update');

        Route::get('/about', [AboutSectionController::class, 'index'])->name('admin.about.index');
        Route::put('/about/{id}', [AboutSectionController::class, 'update'])->name('admin.about.update');

        Route::get('/what-we-do', [WhatWeDoSectionController::class, 'index'])->name('admin.whatwedo.index');
        Route::put('/what-we-do/{id}', [WhatWeDoSectionController::class, 'update'])->name('admin.whatwedo.update');

        Route::get('/services', [ServiceController::class, 'index'])->name('admin.services.index');
        Route::post('/services', [ServiceController::class, 'store'])->name('admin.services.store');
        Route::get('/services/{id}', [ServiceController::class, 'show'])->name('admin.services.show');
        Route::put('/services/{id}', [ServiceController::class, 'update'])->name('admin.services.update');
        Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('admin.services.destroy');

        Route::get('/portfolio', [PortfolioWorkController::class, 'index'])->name('admin.portfolio.index');
        Route::post('/portfolio', [PortfolioWorkController::class, 'store'])->name('admin.portfolio.store');
        Route::get('/portfolio/{id}', [PortfolioWorkController::class, 'show'])->name('admin.portfolio.show');
        Route::put('/portfolio/{id}', [PortfolioWorkController::class, 'update'])->name('admin.portfolio.update');
        Route::delete('/portfolio/{id}', [PortfolioWorkController::class, 'destroy'])->name('admin.portfolio.destroy');

        Route::get('/contact-info', [ContactInfoController::class, 'index'])->name('admin.contact.index');
        Route::put('/contact-info/{id}', [ContactInfoController::class, 'update'])->name('admin.contact.update');
        
        // Social Media Routes
        Route::post('/contact-info/social', [\App\Http\Controllers\Admin\SocialMediaController::class, 'store'])->name('admin.contact.social.store');
        Route::get('/contact-info/social/{id}', [\App\Http\Controllers\Admin\SocialMediaController::class, 'show'])->name('admin.contact.social.show');
        Route::post('/contact-info/social/{id}', [\App\Http\Controllers\Admin\SocialMediaController::class, 'update'])->name('admin.contact.social.update');
        Route::delete('/contact-info/social/{id}', [\App\Http\Controllers\Admin\SocialMediaController::class, 'destroy'])->name('admin.contact.social.destroy');

        Route::get('/messages', [ContactMessageController::class, 'index'])->name('admin.messages.index');
        Route::get('/messages/{id}', [ContactMessageController::class, 'show'])->name('admin.messages.show');
        Route::post('/messages/{id}/read', [ContactMessageController::class, 'markAsRead'])->name('admin.messages.read');
        Route::delete('/messages/{id}', [ContactMessageController::class, 'destroy'])->name('admin.messages.destroy');
    });
});