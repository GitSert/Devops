<?php

use App\Http\Controllers\BeerController;
use App\Http\Controllers\WineController;
use App\Http\Controllers\SpiritController;
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

Route::get('/', function () { return view('index'); })
    ->middleware(['auth'])
    ->name('index');

Route::resource('/beers', BeerController::class)
    ->middleware(['auth']);

Route::resource('/wines', WineController::class)
    ->middleware(['auth']);

Route::resource('/spirits', SpiritController::class)
    ->middleware(['auth']);

Route::get('/dashboard', function () { return view('index'); })
    ->middleware(['auth'])
    ->name('index');

require __DIR__.'/auth.php';
