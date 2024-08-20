<?php

use App\Http\Controllers\API\FileController;
use App\Http\Controllers\API\FolderController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'folders'], function() {
    Route::get('/', [FolderController::class, 'index']);
    Route::post('/', [FolderController::class, 'storeFolder']);
    Route::put('/{id}', [FolderController::class, 'updateFolder']);
    Route::delete('/{id}', [FolderController::class, 'destroyFolder']);
});

Route::group(['prefix' => 'files'], function() {
    Route::get('/', [FileController::class, 'index']);
    Route::post('/', [FileController::class, 'storeFile']);
    Route::post('/{id}', [FileController::class, 'updateFile']);
    Route::delete('/{id}', [FileController::class, 'destroyFile']);
});
