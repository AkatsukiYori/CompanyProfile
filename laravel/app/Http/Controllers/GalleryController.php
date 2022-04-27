<?php

namespace App\Http\Controllers;

// Models
use App\Models\AlbumMedia;
use App\Models\Album;
//pre existing
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    public function view() {
        return view('admin/gallery');
    }
    public function store(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            "nama_album" => "required",
            "deskripsi" => "required",
            "jenis"=>'required',
        ]);

        if($validator ->fails()){
            $messages = $validator->messages();
            return Redirect::back()->withErrors($messages);
        }
        $Album = new Album;
        $Album->akun_id = Auth::user()->id;
        $Album->name = $request-> nama_album;
        $Album->deskripsi = $request->deskripsi;
        $Album->tgl_album=date('Y-m-d');
        $Album->save();
        $id=$Album->id;
        if($request->hasFile('file')){
            foreach($request->file as $files){
            global $filename;
            $file = $files;
            $extension = $file->getClientOriginalExtension();
            $filename = uniqid().'-'.'.' . $extension;
            $file->move('storage/album/'.$request->nama_album, $filename);
            $media = new AlbumMedia;
            $media->akun_id=Auth::user()->id;
            $media->name= $filename;
            $media->album_id= $id;
            $media->kategori = $request->jenis;
            if($request->link == null){
                $media->link = null;
            }else{
                $media->link = $request->link;
            }
            // $media->tgl_media=date('Y-m-d');
            $media->save();
            }
        
            }
            return Redirect::back()->with('success', 'Data Berhasil Ditambahkan');
    }
}
