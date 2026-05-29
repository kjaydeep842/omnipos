<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\SettingsController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics');
Route::get('/billing', [BillingController::class, 'index'])->name('billing');
Route::post('/billing', [BillingController::class, 'store'])->name('billing.store');
Route::delete('/billing/{invoice}', [BillingController::class, 'destroy'])->name('billing.destroy');
Route::get('/vendors', [VendorController::class, 'index'])->name('vendors');
Route::post('/vendors', [VendorController::class, 'store'])->name('vendors.store');
Route::put('/vendors/{vendor}', [VendorController::class, 'update'])->name('vendors.update');
Route::delete('/vendors/{vendor}', [VendorController::class, 'destroy'])->name('vendors.destroy');
Route::get('/booking', [BookingController::class, 'index'])->name('booking');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::put('/booking/{booking}', [BookingController::class, 'update'])->name('booking.update');
Route::delete('/booking/{booking}', [BookingController::class, 'destroy'])->name('booking.destroy');
Route::get('/plans', [PlanController::class, 'index'])->name('plans');
Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
