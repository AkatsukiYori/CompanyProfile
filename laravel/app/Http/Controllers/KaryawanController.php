<?php

namespace App\Http\Controllers;


// Model
use App\Models\Karyawan;
use App\Models\Media;

// Pre-existing
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class KaryawanController extends Controller
{
    public function view() {
        $karyawan = Karyawan::with('media')->get();
        // return $karyawan;
        return view('admin/karyawan', ['karyawan'=>$karyawan]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            "foto" => "required|image",
            "nama" => "required",
            "kategori" => "required",
            "jabatan" => "required",
        ]);
        if($validator->fails()) {
            $messages = $validator->messages();
            return redirect::back()->witherrors($messages);
        }

        if($request->hasFile('foto')){
            global $filename;
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $filename = $request->nama.'-'.'.' . $extension;
            $file->move('storage/karyawan/', $filename);
            $media = new Media;
            $media->akun_id=Auth::user()->id;
            $media->name= $filename;
            $media->kategori = "image";
            $media->jenis= "lainnya";
            $media->tgl_media=date('Y-m-d');
            $media->save();
            $id=$media->id;
        }
            $karyawan = new Karyawan;
            $karyawan->akun_id = Auth::user()->id;
            $karyawan->nama = $request->nama;
            $karyawan->kategori = strtolower($request->kategori);
            $karyawan->jabatan = $request->jabatan;
            $karyawan->media_id = $id;
            $karyawan->save();

            return redirect::back()->with('success','Data karyawan berhasil ditambahkan!');
    }

    public function destroy($id, Request $request) {
        $karyawanDB = Karyawan::find($id);
        $mediaDB = Media::find($request->media_id);
        $imageDestination = 'storage/karyawan/'.$mediaDB->name;
        
        if(File::exists($imageDestination)) {
            File::delete($imageDestination);
        }
        $karyawanDB->delete();
        $mediaDB->delete();
        return redirect::back()->with('success','Data berhasil dihapus!');
    }

    public function edit($id) {
        return Karyawan::with('media')->where('id',$id)->get();
    }

    public function update(Request $request) {
        // dd($request->all());
        $namafile = explode(".",$request->Filename);
        
        $validator = Validator::make($request->all(), [
            "fotoEdit" => "image",
            "namaEdit" => "required",
            "kategoriEdit" => "required",
            "jabatanEdit" => "required",
        ]);
        if($validator->fails()) {
            $messages = $validator->messages();
            return redirect::back()->witherrors($messages);
        }
      
        if($request->Filename == null){ 
            if($request->hasFile('fotoEdit')){
                global $filename;
                $file = $request->file('fotoEdit');
                $extension = $file->getClientOriginalExtension();
                $filename = $request->nama.'-'.'.' . $extension;
                $file->move('storage/karyawan/', $filename);
                $media = new Media;
                $media->akun_id=Auth::user()->id;
                $media->name= $filename;
                $media->kategori = "image";
                $media->jenis= "lainnya";
                $media->tgl_media=date('Y-m-d');
                $media->save();
                $id=$media->id;
                }
                $karyawan = new Karyawan;
                $karyawan->where('id',$id)->update(['akun_id'=>Auth::user()->id, 'nama'=>$request->namaEdit, 'kategori'=>strtolower($request->kategoriEdit), 'jabatan'=>$request->jabatanEdit ,'media_id'=>$id]);
                return Redirect::back()->with('success', 'Data Berhasil Diupdate');
        }else{
            if($request->hasFile('fotoEdit')){
                global $filename;
                $file = $request->file('fotoEdit');
                $extension = $file->getClientOriginalExtension();
                if($namafile[0] == $request->namaEdit){
                    $namaf = $request->Filename;
                }else{
                    $namaf =$request->namaEdit.".".$extension;
                }; 
                $filename =$namaf;
                $file->move('storage/karyawan/', $filename);
                $media = new Media;
                $media->akun_id=Auth::user()->id;
                $kategori = "image";
                $jenis= "lainnya";
                $tgl_media=date('Y-m-d');
                $media->where('id',$request->mediaID)->update(['akun_id'=>Auth::user()->id,'name'=>$namaf,'kategori'=>$kategori,'jenis'=>$jenis,'tgl_media'=>$tgl_media]);
                }
                $karyawan = new Karyawan;
                $karyawan->where('id',$request->editID)->update(['akun_id'=>Auth::user()->id, 'nama'=>$request->namaEdit, 'kategori'=>strtolower($request->kategoriEdit), 'jabatan'=>$request->jabatanEdit, 'media_id'=>$request->mediaID]);
                return Redirect::back()->with('success', 'Data Berhasil Diupdate');
        }
    }
}
