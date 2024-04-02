<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;

Route::get('/', [ContactController::class, 'index'])->name('index');
Route::post('/confirm', [ContactController::class, 'confirm'])->name('confirm');
Route::post('/thanks', [ContactController::class, 'store'])->name('thanks');

Route::get('/admin/search', [ContactController::class, 'search'])->name('search');

Route::get('/contacts/download', [ContactController::class, 'downloadCSV']);

Route::middleware('auth')->group(function () {
    Route::get('/admin', [AuthController::class, 'admin']);
});