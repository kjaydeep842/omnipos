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
Route::get('/vendors', [VendorController::class, 'index'])->name('vendors');
Route::get('/booking', [BookingController::class, 'index'])->name('booking');
Route::get('/plans', [PlanController::class, 'index'])->name('plans');
Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
