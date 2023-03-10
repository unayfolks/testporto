<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\SoalController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/books/add', [BooksController::class, 'insert']);

Route::get('/main/get', [BooksController::class, 'get']);

Route::get('/detail/get/{id}', [BooksController::class, 'getdetail']);

Route::post('/soal/submit', [SoalController::class, 'submit']);

Route::get('/soal/showplayer/{id}', [SoalController::class, 'showplayer']);
Route::get('/soal/getplayer/{id}', [SoalController::class, 'getplayer']);
Route::get('/tambahsoal/generatecode', [SoalController::class, 'generatecode']);
Route::post('/tambahsoal/tambah', [SoalController::class, 'tambahsoal']);
