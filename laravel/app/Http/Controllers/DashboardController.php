<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// models
use App\models\Produk;
use App\models\Mitra;
use App\models\Faqs;
use App\models\Album;
use App\models\Berita;

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
        return response()->json([
            'jumlah_produk' => $produk,
            'jumlah_mitra' => $mitra,
            'jumlah_faqs' => $faqs,
            'jumlah_album' => $album,
            'jumlah_berita' => $berita,
            'status'=>200,
        ]);
    }
}
