<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\TotalController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('titles', TitleController::class);
Route::resource('totals', TotalController::class);
