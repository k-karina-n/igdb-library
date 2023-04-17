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
})->name('books');

Route::get('/summary', function () {
    return view('index');
})->name('summary');

Route::get('/coming', function () {
    return view('index');
})->name('coming');

Route::get('/book', function () {
    return view('book');
});
