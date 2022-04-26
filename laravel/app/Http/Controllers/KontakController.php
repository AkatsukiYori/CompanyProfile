<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function view() {
        return view('admin/kontak');
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            "gambar" => "mimes:jpg,jpeg,png",
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
            $file->move('storage/kontak/', $filename);
            $media = new Media;
            $media->akun_id=Auth::user()->id;
            $media->name= $filename;
            $media->kategori = "image";
            $media->jenis= "lainnya";
            $media->tgl_media=date('Y-m-d');
            $media->save();
            $id=$media->id;
        }
        $kontak = new kontak;
        $kontak->akun_id = Auth::user()->id;
        $kontak->alamat = $request-> alamat_kontak;
        $kontak->telp = $request->telp;
        $kontak->email = $request->email;
        $kontak->facebook = $request->facebook;
        $kontak->twitter = $request->twitter;
        $kontak->media_id=$id;
        $kontak->save();
        return Redirect::back()->with('success', 'Data Berhasil Ditambahkan');
    }
}
