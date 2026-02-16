<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthController, AspirasiController, ResponseController, UserController};

Route::get('auth/login', [AuthController::class, 'showLoginform'])->name('login');
Route::post('auth/postLogin', [AuthController::class, 'login'])->name('postLogin');

Route::middleware(['auth'])->group(function () {
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('aspirasi/add', [AspirasiController::class, 'create'])->name('aspirasi.create');
Route::resource('aspirasi', AspirasiController::class)->except(['create']);

Route::post('/aspirasi/{aspirasi}/responses', [ResponseController::class, 'store'])->name('responses.store');

Route::middleware(['cekrole:admin'])->group(function () {
Route::post('/aspirasi/{aspirasi}/update-status', [AspirasiController::class, 'updateStatus'])->name('aspirasi.updateStatus');

Route::resource('users', UserController::class)->except(['show', 'destroy']);
Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    });
});
