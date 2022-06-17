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
        $namaPC = ""; $namaCEO = ""; $namaHR = ""; $namaHN = ""; $namaHI = ""; $namaHP = "";
        $imagePC = ""; $imageCEO = ""; $imageHR = ""; $imageHN = ""; $imageHI = ""; $imageHP = "";
        $jabatanPC = ""; $jabatanCEO = ""; $jabatanHR = ""; $jabatanHN = ""; $jabatanHI = ""; $jabatanHP = "";
        foreach($karyawan as $key => $kary){
            if(strtolower($kary->jabatan) == "president commissioner"){
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
            }elseif(strtolower($kary->jabatan) == "head of it"){
                $namaHI = $kary->nama;
                $imageHI = $kary->image;
                $jabatanHI = $kary->jabatan;
            }elseif(strtolower($kary->jabatan) == "head of product"){
                $namaHP = $kary->nama;
                $imageHP = $kary->image;
                $jabatanHP = $kary->jabatan;
            }
        }
        
        $Karyawan = array([
            "namaPC" => $namaPC,
            "namaCEO" => $namaCEO,
            "namaHR" => $namaHR,
            "namaHN" => $namaHN,
            "namaHI" => $namaHI,
            "namaHP" => $namaHP,
            "imagePC" => $imagePC,
            "imageCEO" => $imageCEO,
            "imageHR" => $imageHR,
            "imageHN" => $imageHN,
            "imageHI" => $imageHI,
            "imageHP" => $imageHP,
            "jabatanPC" => $jabatanPC,
            "jabatanCEO" => $jabatanCEO,
            "jabatanHR" => $jabatanHR,
            "jabatanHN" => $jabatanHN,
            "jabatanHI" => $jabatanHI,
            "jabatanHP" => $jabatanHP,
        ]);
        
        return response()->json($Karyawan, 200);
    }
    
    public function getCarouselKaryawan(){
        $karyawan = Karyawan::all();
        $Karyawan = [];
        foreach($karyawan as $key => $value){
            if(strtolower($value->jabatan) == "president commissioner" || strtolower($value->jabatan) == "chief executive officer" || strtolower($value->jabatan) == "head of relationship" || strtolower($value->jabatan) == "head of network and infrastructure" || strtolower($value->jabatan) == "head of product" || strtolower($value->jabatan) == "head of it"){
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
        $categories = [];
        $members = [];
        foreach($karyawan as $key => $value){
            if(!in_array($value->kategori, $categories)){
                array_push($categories, $value->kategori);
            }
        }
        
        foreach($categories as $key => $value){
            foreach($karyawan as $memberKey => $member){
                if($member->kategori == $value){
                    $members[$key]['id'] = $key;
                    $members[$key]['kategori'] = ucfirst($value);
                    
                    $memberArray = array(
                        'id' => $memberKey,
                        'member' => $member->nama,
                        'division' => $member->jabatan,
                        'image' => $member->image,
                    );
                    $members[$key]['members'][] = $memberArray;
                }
            }
        }
        return response()->json($members, 200);
    }
}
