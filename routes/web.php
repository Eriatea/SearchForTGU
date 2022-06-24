<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\SearchController::class, 'index'])->name('search');
Route::get('/events', [\App\Http\Controllers\SearchController::class, 'search'])->name('search');


