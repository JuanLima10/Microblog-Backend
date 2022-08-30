<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('read', [BlogController::class, 'index']);

Route::get('read/{id}', [BlogController::class, 'show']);

Route::post('create', [BlogController::class, 'store']);

Route::put('update/{id}', [BlogController::class, 'update']);

Route::delete('delete/{id}', [BlogController::class,'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
