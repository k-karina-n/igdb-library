<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\GetGameController;
use App\Http\Controllers\GetPopularGamesController;
use App\Http\Controllers\GetRecentlyReviewedGamesController;
use App\Http\Controllers\GetComingSoonGamesController;
use App\Http\Controllers\SearchDropdownController;


Route::get('/', [NavigationController::class, 'index'])->name('games');
Route::get('/reviews', [NavigationController::class, 'getReviewsPage'])->name('reviews');
Route::get('/coming', [NavigationController::class, 'getComingSoonPage'])->name('coming');

Route::get('/game_reviews/{slug}', [GetGameController::class, 'get']);

Route::get('/popularGames', [GetPopularGamesController::class, 'get']);
Route::get('/reviewedGames', [GetRecentlyReviewedGamesController::class, 'get']);
Route::get('/comingGames', [GetComingSoonGamesController::class, 'get']);

Route::get('/search', [SearchDropdownController::class, 'get']);
