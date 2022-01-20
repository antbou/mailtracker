<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrackerController;
use App\Http\Controllers\StatisticController;

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



Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [TrackerController::class, 'index'])->name('homepage');
    Route::get('/tracking/{tracker}', [TrackerController::class, 'tracking'])->name('tracking');
    Route::resource('tracker', TrackerController::class);
    Route::get('/statics',[StatisticController::class,'index'])->name('statistics');
    Route::get('/statics/status',[StatisticController::class,'status'])->name('statistics.status');
    Route::get('/statics/browser',[StatisticController::class,'browser'])->name('statistics.browser');
    Route::get('/statics/device',[StatisticController::class,'device'])->name('statistics.device');
    Route::get('/statics/platform',[StatisticController::class,'platform'])->name('statistics.platform');
    Route::get('/statics/country',[StatisticController::class,'country'])->name('statistics.country');
});

// Route after login
Route::get('/redirects', function () {
    return redirect()->route('homepage');
});

require __DIR__ . '/auth.php';
