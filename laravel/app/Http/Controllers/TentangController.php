<?php

namespace App\Http\Controllers;

//models
use App\Models\Tentang;
use App\Models\Media;

//Pre existing
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Redirect;

class TentangController extends Controller
{
    public function view() {
        $tentang = Tentang::all();
        // return $tentang;
        return view('admin/tentangKami',['tentang'=>$tentang]);
    }
    public function store(Request $request){
        // return $request->all();
        $validator = Validator::make($request->all(), [
            "judul_tentang" => "required",
            "deskripsi" => "required",
            "gambar" => "required|mimes:jpg,jpeg,png",
        ]);

        if($validator ->fails()){
            $messages = $validator->messages();
            return Redirect::back()->withErrors($messages);
        }
        if($request->hasFile('gambar')){
            global $filename;
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $filename = uniqid().'-'.'.' . $extension;
            $file->move('storage/tentang/', $filename);
            $media = new Media;
            $media->akun_id=Auth::user()->id;
            $media->name= $filename;
            $media->kategori = "image";
            $media->jenis= "lainnya";
            $media->tgl_media=date('Y-m-d');
            $media->save();
            $id=$media->id;
            }
            $tentang = new Tentang;
            $tentang->akun_id = Auth::user()->id;
            $tentang->judul = $request-> judul_tentang;
            $tentang->deskripsi = $request->deskripsi;
            $tentang->media_id=$id;
            $tentang->save();
            return Redirect::back()->with('success', 'Data Berhasil Ditambahkan');
    }
}
