<?php

use App\Http\Controllers\BaseController;
use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Route;

Route::controller(BaseController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});


Route::controller(FeedbackController::class)->group(function () {
    Route::post('/callback', 'callback')->name('callback');
});
