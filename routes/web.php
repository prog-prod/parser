<?php

use App\Events\HistoryUpdateEvent;
use App\Models\Stock;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Telegram\WebhookController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function() {
    return redirect()->to('/login');
});

Route::any('tg/updates', WebhookController::class);

Route::get('{path}', function() {
//    dd(\App\Models\Stock::find(1)->getUpdatedColumns());
    return view('dashboard.master');
})->where('path', '.*')->name('vue-route');
