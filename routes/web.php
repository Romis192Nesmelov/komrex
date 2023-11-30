<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::controller(BaseController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});

Route::controller(FeedbackController::class)->group(function () {
    Route::post('/callback', 'callback')->name('callback');
});


Route::get('/login', function () {return view('admin.login');})->name('login');
Route::controller(LoginController::class)->group(function () {
    Route::post('/login', 'login')->name('login');
    Route::get('/logout', 'logout')->name('logout');
});
Route::prefix('admin')->middleware(['auth'])->controller(AdminController::class)->name('admin.')->group(function () {
    Route::get('/', 'home')->name('home');

    Route::get('/users/{slug?}', 'users')->name('users');
    Route::post('/edit-user', 'editUser')->name('edit_user');
    Route::post('/delete-user', 'deleteUser')->name('delete_user');

    Route::get('/requisites', 'requisites')->name('requisites');
    Route::post('/edit-requisites', 'editRequisites')->name('edit_requisites');
});
