<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kontak;

class KontakController extends Controller
{
    public function index(){
        $kontak = Kontak::with('media')->get();
        $foto = $kontak[0]->image;
        $email = $kontak[0]->email;
        $alamat = $kontak[0]->alamat;
        $linkAlamat = $kontak[0]->namaLink;
        $no_hp = $kontak[0]->no_hp;
        $youtube = $kontak[0]->youtube;
        $twitter = $kontak[0]->twitter;
        $instagram = $kontak[0]->instagram;
        return response()->json([
            "foto" => $foto,
            "email" => $email,
            "alamat" => $alamat,
            "linkAlamat" => $linkAlamat,
            "no_hp" => $no_hp,
            "youtube" => $youtube,
            "twitter" => $twitter,
            "instagram" => $instagram,
        ],200);
    }
}
