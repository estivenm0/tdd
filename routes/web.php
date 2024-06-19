<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/events', [EventController::class, 'index'])->name('events.index');

Route::post('/events', [EventController::class, 'store'])->name('events.create');

Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');

Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.delete');