<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;

Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/thanks', [ContactController::class, 'store']);

Route::middleware('auth')->group(function () {
    Route::get('/admin', [AuthController::class, 'index']);
});
Route::get('/register', [AuthController::class, 'create']);
Route::post('/register', [AuthController::class, 'store']);