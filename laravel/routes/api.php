<?php

use App\Http\Controllers\API\BeritaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\VisiMisiController;
use App\Http\Controllers\API\TentangController;
use App\Http\Controllers\API\FaqsController;
use App\Http\Controllers\API\GalleryController;
use App\Http\Controllers\API\KaryawanController;
use App\Http\Controllers\API\KontakController;
use App\Http\Controllers\API\MitraController;
use App\Http\Controllers\API\ProdukController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Visi misi
Route::get('visi_misi', [VisiMisiController::class, 'index']);

//tentang kami
Route::get('tentang_kami', [TentangController::class, 'index']);

//Faqs
Route::get('faq', [FaqsController::class, 'index']);

//karyawan
Route::get('karyawan', [KaryawanController::class, 'index']);

//kontak
Route::get('kontak', [KontakController::class, 'index']);

//mitra
Route::get('mitra', [MitraController::class, 'index']);

//produk
Route::get('produk', [ProdukController::class, 'index']);

//berita
Route::get('berita', [BeritaController::class, 'index']);

//gallery
Route::get('gallery', [GalleryController::class, 'index']);
Route::get('albums', [GalleryController::class, 'ShowAlbums']);