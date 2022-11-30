<?php

use App\Http\Controllers\Frontend\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth', 'verified')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
