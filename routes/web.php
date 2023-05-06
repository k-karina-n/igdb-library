<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\MainPageController;

Route::get('/', [PagesController::class, 'index'])->name('games');
Route::get('/reviews', [PagesController::class, 'getReviewPage'])->name('reviews');
Route::get('/coming', [PagesController::class, 'getComingPage'])->name('coming');

Route::get('/game_reviews/{slug}', [PagesController::class, 'getGameReview']);

Route::get('/popularGames', [MainPageController::class, 'getPopularSection']);
Route::get('/reviewedGames', [MainPageController::class, 'getReviewedSection']);
Route::get('/comingGames', [MainPageController::class, 'getComingSection']);
