<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $beritas = \App\Models\Berita::latest()->take(3)->get();
    $jadwals = \App\Models\Jadwal::latest()->take(3)->get();
    return view('welcome', compact('beritas', 'jadwals'));
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('berita', \App\Http\Controllers\BeritaController::class)
    ->middleware(['auth', 'verified'])
    ->parameters(['berita' => 'berita']);

Route::resource('jadwal', \App\Http\Controllers\JadwalController::class)
    ->middleware(['auth', 'verified']);

Route::get('/berita/{berita:slug}', [\App\Http\Controllers\BeritaController::class, 'show'])->name('berita.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
