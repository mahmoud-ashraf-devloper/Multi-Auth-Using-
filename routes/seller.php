<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Seller\SellerController;

Route::prefix('seller')->name('seller.')->group(function () {
    Route::middleware(['guest:seller', 'PreventBackHistory'])->group(function () {
        Route::view('/register', 'dashboard.seller.register')->name('register');
        Route::view('/login', 'dashboard.seller.login')->name('login');

        Route::post('check', [SellerController::class, 'check'])->name('check');
        Route::post('create', [SellerController::class, 'create'])->name('create');
    });
    Route::middleware(['auth:seller', 'PreventBackHistory'])->group(function () {
        Route::view('/home', 'dashboard.seller.home')->name('home');
        Route::post('/logout', [SellerController::class, 'logout'])->name('logout');
    });
});
