<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\VisiMisi;

class VisiMisiController extends Controller
{
    public function index(){
        $visi_misi = [
            "visi" => VisiMisi::all()[0]->visi,
            "misi" => VisiMisi::all()[0]->misi
        ];
        return response()->json($visi_misi, 200);
    }
}
