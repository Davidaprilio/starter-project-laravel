<?php

use Illuminate\Support\Facades\Route;
use Davidaprilio\LaravelStarter\Http\Controllers;
use Davidaprilio\LaravelStarter\Http\Controllers\Api;


Route::middleware('web')->group(function () {

    Route::get('/login', [Controllers\AuthenticationController::class, 'show'])->name('login');
    Route::post('/login', [Controllers\AuthenticationController::class, 'store']);
    Route::post('/logout', [Controllers\AuthenticationController::class, 'destroy'])->name('logout');

    Route::get('/photo/profile/{sizeorfile}/{file?}', [Controllers\ProfileController::class, 'getPhoto']);

    Route::middleware('auth')->group(function () {

        Route::get('/', function () {
            return view('home');
        })->name('home');

        Route::name('user.')->group(function () {
            # Route User
            Route::get('users', [Controllers\UserController::class, 'index'])->name('index');

            Route::prefix('user')->group(function () {
                // Route::get('/{user:id}', [Controllers\UserController::class, 'show'])->name('show');
                Route::delete('/{user:id}', [Controllers\UserController::class, 'destroy'])->name('delete');
            });

            Route::prefix('/profile')->group(function () {
                Route::get('/', [Controllers\ProfileController::class, 'show'])->name('profile');
                Route::put('/', [Controllers\ProfileController::class, 'update']);

                Route::name('profile.')->group(function () {
                    Route::put('photo', [Controllers\ProfileController::class, 'photo'])->name('photo');
                    Route::put('password', [Controllers\ProfileController::class, 'password'])->name('password');
                });
            });
        });
    });
});
