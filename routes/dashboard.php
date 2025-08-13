<?php


// dashboard routes

use App\Http\Controllers\Dashboard\GenreController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\ReportController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\MediaController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'dashboard',
    'middleware' => ['auth'],
    'as' => 'dashboard.'
], function () {
    /* ********************************************************** */

    // Dashboard ************************
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Logs ************************
    // Route::get('logs', [ActivityLogController::class, 'index'])->name('logs.index');
    // Route::get('getLogs', [ActivityLogController::class, 'getLogs'])->name('logs.getLogs');

    // users ************************
    // Route::get('profile/settings', [UserController::class, 'settings'])->name('profile.settings');

    // media ************************
    // Route::get('media', [MediaController::class, 'media'])->name('media');

    // reports ************************
    Route::get('report', [ReportController::class, 'index'])->name('report.index');
    Route::post('report/export', [ReportController::class, 'export'])->name('report.export');

    /* ********************************************************** */

    // Employees ************************


    /* ********************************************************** */

    // Resources

    // Route::resource('constants', ConstantController::class)->only(['index', 'store', 'destroy']);
    // Route::resource('currencies', CurrencyController::class)->except(['show', 'edit', 'create']);


    Route::resources([
        'users' => UserController::class,
        'media' => MediaController::class,
        'genres' => GenreController::class,
    ]);
    /* ********************************************************** */
});
