<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/albums', [App\Http\Controllers\AlbumController::class, 'index'])->name('albums.index');
Route::get('/albums/create', [App\Http\Controllers\AlbumController::class, 'create'])->name('albums.create');
Route::get('/albums/{album}', [App\Http\Controllers\AlbumController::class, 'show'])->name('albums.show');
Route::post('/albums', [App\Http\Controllers\AlbumController::class, 'store'])->name('albums.store');

Route::get('/albums/{album}/edit', [App\Http\Controllers\AlbumController::class, 'edit'])->name('albums.edit');
Route::put('/albums/{album}', [App\Http\Controllers\AlbumController::class, 'update'])->name('albums.update');
Route::delete('/albums/{album}', [App\Http\Controllers\AlbumController::class, 'destroy'])->name('albums.destroy');

require __DIR__.'/auth.php';
