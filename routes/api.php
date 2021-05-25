<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\User\ProfileController;
use App\Http\Controllers\Api\User\ProfilePasswordController;
use App\Http\Controllers\Api\User\LogoutController;
use App\Http\Controllers\Api\User\StockFilterSettingsController;
use App\Http\Controllers\Api\User\DashboardController;
use App\Http\Controllers\Api\User\VerificationController;
use App\Http\Controllers\Api\User\TrackVerificationController;

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

Route::group(['prefix' => 'auth'], function() {
    Route::post('login', LoginController::class);
    Route::post('register', RegisterController::class);
});

Route::group(['middleware' => ['auth:api']], function() {
    Route::group(['prefix' => 'user'], function() {
        Route::get('profile', [ProfileController::class, 'show']);
        Route::put('profile', [ProfileController::class, 'update']);
        Route::put('profile/password', ProfilePasswordController::class);
        Route::put('profile/stock-filter/settings', StockFilterSettingsController::class);

        Route::group(['prefix' => 'verification'], function() {
            Route::post('telegram', [VerificationController::class, 'telegram']);

            Route::group(['prefix' => 'verified'], function() {
                Route::get('telegram', [TrackVerificationController::class, 'telegram']);
            });
        });

        Route::delete('logout', LogoutController::class);
    });

    Route::get('dashboard', [DashboardController::class, 'dashboard']);
    Route::get('stock/{stock}', [DashboardController::class, 'stock']);
});
