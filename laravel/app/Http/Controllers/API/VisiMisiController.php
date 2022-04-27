<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\VisiMisi;

class VisiMisiController extends Controller
{
    public function index(){
        $visi = VisiMisi::pluck('visi');
        $misi = VisiMisi::pluck('misi');
        return response()->json(["visi" => $visi, "misi" => $misi], 200);
    }
}
