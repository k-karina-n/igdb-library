<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetPageController;
use App\Http\Controllers\GetGameController;
use App\Http\Controllers\GetPopularGamesController;
use App\Http\Controllers\GetRecentlyReviewedGamesController;
use App\Http\Controllers\GetComingSoonGamesController;


Route::get('/', [GetPageController::class, 'index'])->name('games');
Route::get('/reviews', [GetPageController::class, 'getReviewsPage'])->name('reviews');
Route::get('/coming', [GetPageController::class, 'getComingSoonPage'])->name('coming');

Route::get('/game_reviews/{slug}', [GetGameController::class, 'get']);

Route::get('/popularGames', [GetPopularGamesController::class, 'get']);
Route::get('/reviewedGames', [GetRecentlyReviewedGamesController::class, 'get']);
Route::get('/comingGames', [GetComingSoonGamesController::class, 'get']);
