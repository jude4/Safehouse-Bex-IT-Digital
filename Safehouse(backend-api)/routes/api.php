<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('login', [LoginController::class, '__invoke']);

Route::post('register', [RegisterController::class, '__invoke']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('listings', [ListingController::class, 'index']);

    Route::post('listings', [ListingController::class, 'store']);

    Route::post('logout', [LogoutController::class, '__invoke']);
});
