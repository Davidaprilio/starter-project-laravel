<?php

use Illuminate\Support\Facades\Route;
use Davidaprilio\LaravelStarter\Http\Controllers\Api;

Route::get('/photo', [Api\ImageController::class, 'resize'])->name('user');