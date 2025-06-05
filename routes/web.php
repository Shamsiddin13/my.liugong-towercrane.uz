<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/l/{link}', [LandingController::class, 'show'])->name('landing.show');
Route::post('/l/submit-form', [LandingController::class, 'submitForm'])->name('landing.submit');
Route::get('/l/thanks', [LandingController::class, 'thanks'])->name('landing.thanks');
