<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// models
use App\Models\Produk;
use App\Models\Mitra;
use App\Models\Faqs;
use App\Models\Album;
use App\Models\Berita;
use App\Models\Karyawan;

class DashboardController extends Controller
{
    public function view() {
        return view('admin/dashboard');
    }
    public function scorebox(){
        $produk = Produk::count();
        $mitra = Mitra::count();
        $faqs = Faqs::count();
        $album = Album::count();
        $berita = Berita::count();
        $karyawan = Karyawan::count();
        return response()->json([
            'jumlah_produk' => $produk,
            'jumlah_mitra' => $mitra,
            'jumlah_faqs' => $faqs,
            'jumlah_album' => $album,
            'jumlah_berita' => $berita,
            'jumlah_karyawan' => $karyawan,
            'status'=>200,
        ]);
    }
}
