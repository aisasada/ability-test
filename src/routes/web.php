<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;

Route::get('/', [ContactController::class, 'index'])->name('index');
Route::post('/confirm', [ContactController::class, 'confirm'])->name('confirm');
Route::post('/thanks', [ContactController::class, 'store'])->name('thanks');



Route::get('/admin', [ContactController::class, 'admin']);
Route::get('/admin', [ContactController::class, 'find']);
Route::post('/admin',[ContactController::class, 'search']);

Route::get('/contacts/download', [ContactController::class, 'downloadCSV']);

Route::get('/admin', [ContactController::class, 'admin']);
Route::get('/auth/register', [ContactController::class, 'create']);
Route::post('auth//register', [ContactController::class, 'store']);