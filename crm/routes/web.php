<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BandController;
use App\Http\Controllers\AlbumController;
use Laravel\Fortify\Fortify;

// Redericionar para a bands
Route::get('/', function () {
    return redirect('/bands');
});

// Bandas
Route::resource('/bands', BandController::class);
Route::get('/bands/{band}/albums', [BandController::class, 'showAlbums'])->name('bands.albums');

// Albuns
Route::get('/bands/{band}/albums/create', [AlbumController::class, 'create'])->name('albums.create');
Route::post('/bands/{band}/albums', [AlbumController::class, 'store'])->name('albums.store');
Route::get('/bands/{band}/albums/{album}', [AlbumController::class, 'show'])->name('albums.show');
Route::get('/bands/{band}/albums/{album}/edit', [AlbumController::class, 'edit'])->name('albums.edit');
Route::put('/bands/{band}/albums/{album}', [AlbumController::class, 'update'])->name('albums.update');
Route::delete('/bands/{band}/albums/{album}', [AlbumController::class, 'destroy'])->name('albums.destroy');