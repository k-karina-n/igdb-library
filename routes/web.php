<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamesController;

Route::get('/', [GamesController::class, 'index'])->name('games');

Route::get('/reviews', function () {
    return view('index');
})->name('reviews');

Route::get('/coming', function () {
    return view('index');
})->name('coming');

Route::get('/game_reviews', function () {
    return view('game-review');
});
