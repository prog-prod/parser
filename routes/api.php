<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\{RegisterController, LoginController};
use App\Http\Controllers\Api\User\{ProfileController, ProfilePasswordController, LogoutController, DashboardController};


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

	    Route::get('dashboard', [DashboardController::class, 'dashboard']);

        Route::delete('logout', LogoutController::class);
    });


});
