<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Karyawan;

class KaryawanController extends Controller
{
    public function index(){
        $karyawan = Karyawan::with('media')->orderBy('created_at', 'DESC')->get();
        // return $karyawan;
        $Karyawan = [
            "nama1" => "",
            "nama2" => "",
            "nama3" => "",
            "nama4" => "",
            "image1" => "",
            "image2" => "",
            "image3" => "",
            "image4" => "",
            "jabatan1" => "",
            "jabatan2" => "",
            "jabatan3" => "",
            "jabatan4" => ""
        ];
        foreach($karyawan as $key => $kary){
            (strtolower($kary->jabatan) == "presiden commisioner") ? $Karyawan->nama1 = $kary->nama : '';

        }
        return response()->json($Karyawan, 200);
    }
}
