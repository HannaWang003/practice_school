<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TitleController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('titles', TitleController::class);
