<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

// Rute halaman utama
Route::get('/', [PortfolioController::class, 'index'])->name('home');

// Rute halaman-halaman statis
Route::view('/welcome', 'welcome');
Route::view('/about', 'about');
Route::view('/portfolio', 'portfolio');
Route::view('/publication', 'publication');
Route::view('/contact', 'contact');

// Rute untuk halaman settings (form tambah portfolio)
Route::get('/settings', [PortfolioController::class, 'create'])->name('settings');

// Resource route untuk portfolios, tanpa metode 'show' karena tidak digunakan
Route::resource('portfolios', PortfolioController::class);
