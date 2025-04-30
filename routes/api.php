<?php

use App\Http\Controllers\SocksController;
use Illuminate\Support\Facades\Route;

Route::get('/socks', [SocksController::class, 'index']);
Route::post('/socks/income', [SocksController::class, 'income']);
Route::post('/socks/outcome', [SocksController::class, 'outcome']);
