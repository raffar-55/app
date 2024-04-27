<?php

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\PlayerControllerController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index'])->name('home');

Route::controller(PlayerController::class)
    ->prefix('players')
    ->name('players.')
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show')->where('id', '[0-9]+');
    });
