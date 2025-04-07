<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/OrtegaDaniel');
});

// Existing feature route
Route::get('/OrtegaDaniel', [FeatureController::class, 'index'])->name('features.index');

// Category routes
Route::get('/OrtegaDaniel/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/OrtegaDaniel/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/OrtegaDaniel/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/OrtegaDaniel/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/OrtegaDaniel/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

// Item routes
Route::get('/OrtegaDaniel/items', [ItemController::class, 'index'])->name('items.index');
Route::post('/OrtegaDaniel/items', [ItemController::class, 'store'])->name('items.store');
Route::get('/OrtegaDaniel/items/{id}/edit', [ItemController::class, 'edit'])->name('items.edit');
Route::put('/OrtegaDaniel/items/{id}', [ItemController::class, 'update'])->name('items.update');
Route::delete('/OrtegaDaniel/items/{id}', [ItemController::class, 'destroy'])->name('items.destroy');