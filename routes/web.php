<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('games');

Route::get('/reviews', function () {
    return view('index');
})->name('reviews');

Route::get('/coming', function () {
    return view('index');
})->name('coming');

Route::get('/game_reviews', function () {
    return view('game-review');
});
