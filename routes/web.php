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

Route::get('/', [App\Http\Controllers\FootballScoreboard::class, 'home']);

Route::get('startGame/{id}', 'App\Http\Controllers\FootballScoreboard@startGame');
Route::get('updateGame/{id}', 'App\Http\Controllers\FootballScoreboard@updateGame');
Route::get('endGame/{id}', 'App\Http\Controllers\FootballScoreboard@endGame');
Route::get('getSummary', 'App\Http\Controllers\FootballScoreboard@getSummary');

