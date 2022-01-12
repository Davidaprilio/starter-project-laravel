<?php

use Illuminate\Support\Facades\Route;
use Davidaprilio\LaravelStarter\Http\Controllers;
use Davidaprilio\LaravelStarter\Http\Controllers\Api;


Route::middleware('web')->group(function () {

    Route::get('/login', [Controllers\AuthenticationController::class, 'show'])->name('login');
    Route::post('/login', [Controllers\AuthenticationController::class, 'store']);
    Route::post('/logout', [Controllers\AuthenticationController::class, 'destroy'])->name('logout');

    Route::get('/photo', [Api\ImageController::class, 'resize'])->name('user');
});
