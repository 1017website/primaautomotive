<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\ContactMessageController;

// ===== FRONTEND =====
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/track', [HomeController::class, 'track'])->name('track');
Route::post('/contact', [HomeController::class, 'sendMessage'])->name('contact.send');

// ===== AUTH (Breeze akan generate auth.php — load jika sudah ada) =====
if (file_exists(__DIR__.'/auth.php')) {
    require __DIR__.'/auth.php';
}

// ===== ADMIN =====
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/settings/{group}', [SettingController::class, 'show'])->name('settings.show');
    Route::post('/settings/{group}', [SettingController::class, 'update'])->name('settings.update');
    Route::resource('services', ServiceController::class);
    Route::resource('reviews', ReviewController::class);
    Route::resource('bookings', BookingController::class);
    Route::resource('messages', ContactMessageController::class)->only(['index', 'show', 'destroy']);
});
