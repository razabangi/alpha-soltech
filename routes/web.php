<?php

use App\Http\Controllers\FacebookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('search-post', [FacebookController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('facebook.store');

Route::get('facebook', [FacebookController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('facebook.index');

require __DIR__.'/auth.php';
