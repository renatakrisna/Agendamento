<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MeetingController;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('meetings', App\Http\Controllers\MeetingController::class);
});

