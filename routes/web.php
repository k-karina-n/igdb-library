<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\QueryController;

Route::get('/', [PagesController::class, 'index'])->name('games');
Route::get('/reviews', [PagesController::class, 'index'])->name('reviews');
Route::get('/coming', [PagesController::class, 'index'])->name('coming');

Route::get('/game_reviews/{slug}', [PagesController::class, 'gameReview']);

Route::get('/popularGames', [QueryController::class, 'getPopular']);
Route::get('/reviewedGames', [QueryController::class, 'getReviewed']);
Route::get('/comingGames', [QueryController::class, 'getComing']);
