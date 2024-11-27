<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/create', [UserController::class, 'index'])->name('user.create');
Route::post('/user/create', [UserController::class, 'store']);
