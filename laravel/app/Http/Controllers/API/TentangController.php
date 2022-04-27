<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tentang;

class TentangController extends Controller
{
    public function index(){
        $about = Tentang::with('media')->get();
        $tentangKami = [];
        foreach($about as $key => $tentang){
            $tentangKami[$key]['id'] = $tentang->id;
            $tentangKami[$key]['judul'] = $tentang->judul;
            $tentangKami[$key]['deskripsi'] = $tentang->deskripsi;
            $tentangKami[$key]['media'] = $tentang->media->name;
        }
        return response()->json($tentangKami, 200);
    }
}
