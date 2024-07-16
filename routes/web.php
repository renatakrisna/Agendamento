<?php

use App\Http\Controllers\CoordinatorHoursController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MeetingController;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('meetings', MeetingController::class);
    Route::get('/coordinator_hours/{id}/edit', [CoordinatorHoursController::class, 'edit'])->name('coordinator_hours.edit');
    Route::put('/coordinator_hours/{id}', [CoordinatorHoursController::class, 'update'])->name('coordinator_hours.update');
});