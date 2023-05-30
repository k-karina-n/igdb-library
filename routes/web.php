<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\GetPopularGamesController;
use App\Http\Controllers\GetRecentlyReviewedGamesController;
use App\Http\Controllers\GetComingSoonGamesController;
use App\Http\Controllers\SearchDropdownController;


Route::get('/', [NavigationController::class, 'index'])->name('games');
Route::get('/game_reviews/{slug}', [NavigationController::class, 'getGameReview']);

Route::get('/popularGames', [GetPopularGamesController::class, 'get']);
Route::get('/reviewedGames', [GetRecentlyReviewedGamesController::class, 'get']);
Route::get('/comingGames', [GetComingSoonGamesController::class, 'get']);

Route::get('/search', [SearchDropdownController::class, 'get']);
