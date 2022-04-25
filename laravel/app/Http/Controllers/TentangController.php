<?php

namespace App\Http\Controllers;

//models
use App\Models\Tentang;

//Pre existing
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TentangController extends Controller
{
    public function view() {
        return view('admin/tentangKami');
    }
    public function store(Request $request){
        return $request->all();
        $validator = Validator::make($request->all(), [
            "judul_tentang" => "required",
            "deskripsi" => "required",
            "gambar" => "required|mimes:jpg,jpeg,png",
        ]);

        if($validator ->fails()){
            $messages = $validator->messages();
            return $messages;
        }
        if($request->hasFile('gambar')){
            global $filename;
            $file = $request->file('gambar_activity');
            $extension = $file->getClientOriginalExtension();
            $filename = uniqid().'-'.'.' . $extension;
            $file->move('storage/activity/', $filename);
            $media = new Media;
            $media->akun_id=Auth::user()->name;
            $media->kategori = "image";
            $media->jenis= "lainnya";
            $media->tgl_media=date('d-m-Y');
            $media->save();
            $id=$media->id;
            }
            // $tentang = new Tentang;
            // $tentang->akun_id = Auth::user()->id;
            // $tentang->judul = $request-> 

    }
}
