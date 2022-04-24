<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\FaqsController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\DashboardController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin/home');
});

// Dashboard
Route::get('/dashboard',[App\Http\Controllers\DashboardController::class, 'view'])->name('dashboard');

// Tentang Kami
Route::get('/tentang',[App\Http\Controllers\TentangController::class, 'view'])->name('tentang');

// Faqs
Route::get('/faqs',[App\Http\Controllers\FaqsController::class, 'view'])->name('faqs');

// Mitra
Route::get('/mitra',[App\Http\Controllers\MitraController::class, 'view'])->name('mitra');

// Kontak
Route::get('/kontak',[App\Http\Controllers\KontakController::class, 'view'])->name('kontak');

// Gallery
Route::get('/gallery',[App\Http\Controllers\GalleryController::class, 'view'])->name('gallery');
