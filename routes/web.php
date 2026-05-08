<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingPageController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AnalyticsController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\ScriptController;
use App\Http\Controllers\Admin\ArtisanController;

// ===== FRONTEND =====
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/track', [HomeController::class, 'track'])->name('track');
Route::post('/contact', [HomeController::class, 'sendMessage'])->name('contact.send');
Route::post('/analytics/click', [AnalyticsController::class, 'recordClick'])->name('analytics.click');

// ===== BOOKING PAGE =====
Route::get('/booking', [BookingPageController::class, 'index'])->name('booking');
Route::post('/booking', [BookingPageController::class, 'store'])->name('booking.store');

// ===== LANGUAGE =====
Route::get('/lang/{locale}', [LanguageController::class, 'switch'])->name('lang.switch');

// ===== AUTH =====
if (file_exists(__DIR__.'/auth.php')) {
    require __DIR__.'/auth.php';
}

// ===== ADMIN =====
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics');

    Route::get('/settings/{group}', [SettingController::class, 'show'])->name('settings.show');
    Route::post('/settings/{group}', [SettingController::class, 'update'])->name('settings.update');

    Route::get('/scripts', [ScriptController::class, 'index'])->name('scripts.index');
    Route::post('/scripts', [ScriptController::class, 'update'])->name('scripts.update');

    Route::resource('services', ServiceController::class);
    Route::resource('reviews', ReviewController::class);
    Route::resource('bookings', BookingController::class);
    Route::resource('messages', ContactMessageController::class)->only(['index', 'show', 'destroy']);

    Route::get('/artisan', [ArtisanController::class, 'index'])->name('artisan.index');
    Route::post('/artisan/run', [ArtisanController::class, 'run'])->name('artisan.run');
});
