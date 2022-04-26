<?php

namespace App\Http\Controllers;

//models
use App\Models\Tentang;
use App\Models\Media;

//Pre existing
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

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
    public function edit($id){
        return Tentang::with('media')->where('id', $id)->get();
    }
    public function update(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            "judul_tentang" => "required",
            "deskripsi_edit" => "required",
            "gambar" => "mimes:jpg,jpeg,png",
        ]);

        if($validator ->fails()){
            $messages = $validator->messages();
            return Redirect::back()->withErrors($messages);
        }
        if($request->Filename == null){ 
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
                $tentang->where('id',$id)->update(['akun_id'=>Auth::user()->id,'judul'=>$request->judul_tentang,'deskripsi'=>$request->deskripsi_edit,'media_id'=>$id]);
                return Redirect::back()->with('success', 'Data Berhasil Diupdate');
        }else{
            if($request->hasFile('gambar')){
                global $filename;
                $file = $request->file('gambar');
                $extension = $file->getClientOriginalExtension();
                $filename =$request->Filename;
                $file->move('storage/tentang/', $filename);
                $media = new Media;
                $media->akun_id=Auth::user()->id;
                $kategori = "image";
                $jenis= "lainnya";
                $tgl_media=date('Y-m-d');
                $media->where('id',$request->mediaID)->update(['akun_id'=>Auth::user()->id,'name'=>$filename,'kategori'=>$kategori,'jenis'=>$jenis,'tgl_media'=>$tgl_media]);
                }
                $tentang = new Tentang;
                $tentang->where('id',$request->editID)->update(['akun_id'=>Auth::user()->id,'judul'=>$request->judul_tentang,'deskripsi'=>$request->deskripsi_edit,'media_id'=>$request->mediaID]);
                return Redirect::back()->with('success', 'Data Berhasil Diupdate');
        }
    }
    public function delete($id){
        Tentang::where('id',$id)->delete();
        return Redirect::back()->with('success', 'Data Berhasil Dihapus');
    }
}
