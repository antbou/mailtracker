<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\TrackerController;

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
});

// Route after login
Route::get('/redirects', function () {
    return redirect()->route('homepage');
});

require __DIR__ . '/auth.php';
