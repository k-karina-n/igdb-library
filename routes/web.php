<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\QueryController;

Route::get('/', function () {
    return view('index');
})->name('games');
Route::get('/reviews', [PagesController::class, 'index'])->name('reviews');
Route::get('/coming', [PagesController::class, 'index'])->name('coming');

Route::get('/game_reviews', function () {
    return view('game-review');
});

Route::get('/popularGames', [QueryController::class, 'getPopular']);
Route::get('/reviewedGames', [QueryController::class, 'getReviewed']);
Route::get('/comingGames', [QueryController::class, 'getComing']);
