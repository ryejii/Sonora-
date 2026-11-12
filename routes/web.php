<?php

use App\Support\Catalogo;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('inicio', [
    'pistas' => Catalogo::pistas(),
    'playlists' => Catalogo::playlists(),
]))->name('inicio');

Route::get('/playlist/{slug}', function (string $slug) {
    $playlist = collect(Catalogo::playlists())->firstWhere('slug', $slug) ?? abort(404);
    return view('playlist', ['pistas' => Catalogo::pistas(), 'playlist' => $playlist]);
})->name('playlist');

Route::get('/reproductor', fn () => view('reproductor', ['pistas' => Catalogo::pistas()]))->name('reproductor');