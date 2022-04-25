<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\FaqsController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\HomeController;

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

Auth::routes();

Route::get('/',[DashboardController::class, 'view'])->middleware('auth');

// Dashboard
Route::get('/dashboard',[DashboardController::class, 'view'])->name('dashboard');

// Tentang Kami
Route::get('/tentang',[TentangController::class, 'view'])->name('tentang')->middleware('auth');

// Faqs
Route::get('/faqs',[FaqsController::class, 'view'])->name('faqs')->middleware('auth');

// Mitra
Route::get('/mitra',[MitraController::class, 'view'])->name('mitra')->middleware('auth');

// Kontak
Route::get('/kontak',[KontakController::class, 'view'])->name('kontak')->middleware('auth');

// Gallery
Route::get('/gallery',[GalleryController::class, 'view'])->name('gallery');

// Visi Misi
Route::get('/visiMisi',[VisiMisiController::class, 'view'])->name('visiMisi');
