<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthorController;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\AuthController;




Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('logout', [AuthController::class, 'logout']);
    // Authors API Routes
    Route::get('authors', [AuthorController::class, 'index']);
    Route::get('authors/{id}', [AuthorController::class, 'show']);
    Route::post('authors', [AuthorController::class, 'store']);
    Route::post('authors/{id}', [AuthorController::class, 'update']);
    Route::delete('authors/{id}', [AuthorController::class, 'destroy']);
    // Books API Routes
    Route::get('books', [BookController::class, 'index']);
    Route::get('books/{id}', [BookController::class, 'show']);
    Route::post('books', [BookController::class, 'store']);
    Route::post('books/{id}', [BookController::class, 'update']);
    Route::delete('books/{id}', [BookController::class, 'destroy']);
});
