<?php

use Davidaprilio\LaravelStarter\Http\Controllers\Api\DaerahIndonesia;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'api', 'middleware' => 'api'], function () {

    // --------------------------------------------------------------------------
    // Api Daerah
    // --------------------------------------------------------------------------
    Route::get('/provinsi', [DaerahIndonesia::class, 'provinsi']);
    Route::get('/kota/{prov_id}', [DaerahIndonesia::class, 'kota']);
    Route::get('/kecamatan/{kota_id}', [DaerahIndonesia::class, 'kecamatan']);
    // --------------------------------------------------------------------------

});
