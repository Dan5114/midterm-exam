<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeatureController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/OrtegaDaniel');
});

Route::get('/OrtegaDaniel', [FeatureController::class, 'index'])->name('features.index');