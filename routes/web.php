<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\TotalController;
use App\Http\Controllers\MyController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [MyController::class, 'myindex']);

Route::resource('titles', TitleController::class);
Route::resource('totals', TotalController::class);
