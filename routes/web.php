<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartementController;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::middleware('role:admin')->prefix('setup')->name('setup.')->group(function () {
        Route::get('departement', [DepartementController::class, 'index'])->name('departements.index');
    });
});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
