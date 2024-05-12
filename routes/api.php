<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\StoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
Route::resource('books', BookController::class);
Route::resource('stores', StoreController::class);
// Attach a Book to a Store
Route::post('stores/{store_id}/books/{book_id}/attach', [StoreController::class, 'attachBook']);

// Detach a Book from a Store
Route::post('stores/{store_id}/books/{book_id}/detach', [StoreController::class, 'detachBook']);

// Attach a Store to a Book
Route::post('books/{book_id}/stores/{store_id}/attach', [BookController::class, 'attachStore']);

// Detach a Store from a Book
Route::post('books/{book_id}/stores/{store_id}/detach', [BookController::class, 'detachStore']);
});
