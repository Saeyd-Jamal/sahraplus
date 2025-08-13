<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('dashboard.home');
})->name('home');


require __DIR__ . '/dashboard.php';
