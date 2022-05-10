<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Karyawan;

class KaryawanController extends Controller
{
    public function index(){
        $karyawan = Karyawan::orderBy('created_at', 'DESC')->get();
        // return $karyawan;
        $namaPC = ""; $namaCEO = ""; $namaHR = ""; $namaHN = "";
        $imagePC = ""; $imageCEO = ""; $imageHR = ""; $imageHN = "";
        $jabatanPC = ""; $jabatanCEO = ""; $jabatanHR = ""; $jabatanHN = "";
        foreach($karyawan as $key => $kary){
            if(strtolower($kary->jabatan) == "president commisioner"){
                $namaPC = $kary->nama;
                $imagePC = $kary->image;
                $jabatanPC = $kary->jabatan;
            }elseif(strtolower($kary->jabatan) == "chief executive officer"){
                $namaCEO = $kary->nama;
                $imageCEO = $kary->image;
                $jabatanCEO = $kary->jabatan;
            }elseif(strtolower($kary->jabatan) == "head of relationship"){
                $namaHR = $kary->nama;
                $imageHR = $kary->image;
                $jabatanHR = $kary->jabatan;
            }elseif(strtolower($kary->jabatan) == "head of network and infrastructure"){
                $namaHN = $kary->nama;
                $imageHN = $kary->image;
                $jabatanHN = $kary->jabatan;
            }
        }
        
        $Karyawan = array([
            "namaPC" => $namaPC,
            "namaCEO" => $namaCEO,
            "namaHR" => $namaHR,
            "namaHN" => $namaHN,
            "imagePC" => $imagePC,
            "imageCEO" => $imageCEO,
            "imageHR" => $imageHR,
            "imageHN" => $imageHN,
            "jabatanPC" => $jabatanPC,
            "jabatanCEO" => $jabatanCEO,
            "jabatanHR" => $jabatanHR,
            "jabatanHN" => $jabatanHN,
        ]);
        
        return response()->json($Karyawan, 200);
    }
    
    public function getCarouselKaryawan(){
        $karyawan = Karyawan::all();
        $Karyawan = [];
        foreach($karyawan as $key => $value){
            if(strtolower($value->jabatan) == "president commisioner" || strtolower($value->jabatan) == "chief executive officer" || strtolower($value->jabatan) == "head of relationship" || strtolower($value->jabatan) == "head of network and infrastructure"){
                $Karyawan[$key]['id'] = $key;
                $Karyawan[$key]['name'] = $value->nama;
                $Karyawan[$key]['division'] = $value->jabatan;
                $Karyawan[$key]['image'] = $value->image;
            }
        }
        return response()->json($Karyawan, 200);
    }
    
    public function getTeam(){
        $karyawan = Karyawan::all();
        $Karyawan = [];
        foreach($karyawan as $key => $value){
            
        }
    }
}
