<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Model
use App\Models\Kontak;
use App\Models\Media;

// Pre-existing
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;


class KontakController extends Controller
{
    public function view() {
        $kontak = Kontak::with('media')->get();
        // return $kontak;
        return view('admin/kontak',['kontak'=>$kontak]);
    }
    public function store(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            "foto" => "required|image",
        ]);
        if($validator ->fails()){
            $messages = $validator->messages();
            return Redirect::back()->withErrors($messages);
        }
        if($request->hasFile('foto')){
            global $filename;
            $file = $request->file('foto');
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
            if(Kontak::where('akun_id',Auth::user()->id)->exists()){
                return redirect::back()->witherrors("Anda sudah mengisi kontak tersebut!");
            }else{
                $kontak->alamat = $request->alamat;
                $kontak->namaLink = $request->namaLink;
                $kontak->no_hp = $request->no_hp;
                $kontak->email = $request->email;
                $kontak->youtube = $request->youtube;
                $kontak->twitter = $request->twitter;
                $kontak->instagram = $request->instagram;
                $kontak->media_id=$id;
                $kontak->save();
            }
            return Redirect::back()->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id) {
        return Kontak::with('media')->where('id',$id)->get();
        // return $id;
    }

    public function update(Request $request) {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            "fotoEdit" => "image",
        ]);

        if($validator ->fails()){
            $messages = $validator->messages();
            return Redirect::back()->withErrors($messages);
        }
        if($request->Filename == null){
            // dd($request->all());
            if($request->hasFile('fotoEdit')){
                global $filename;
                $file = $request->file('fotoEdit');
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
            // dd($request->all());
                $kontak = new Kontak;
                // return $request->all();
                $kontak->where('id',$id)->update(['akun_id'=>Auth::user()->id,'alamat'=>$request->alamatEdit, 'no_hp'=>$request->no_hpEdit, 'namaLink'=>$request->namaLinkEdit, 'email'=>$request->emailEdit, 'youtube'=>$request->youtubeEdit, 'instagram'=>$request->instagramEdit, 'twitter'=>$request->twitterEdit, 'media_id'=>$request->id]);

                return redirect::back()->with('success','Data berhasil diubah!');
        }else{
            if($request->hasFile('fotoEdit')){
                // dd($request->all());
                global $filename;
                $file = $request->file('fotoEdit');
                $extension = $file->getClientOriginalExtension();
                $filename = uniqid().'-'.'.' . $extension;
                $file->move('storage/kontak/', $filename);
                $media = new Media;
                $media->akun_id=Auth::user()->id;
                $media->name= $filename;
                $kategori = "image";
                $jenis= "lainnya";
                $tgl_media=date('Y-m-d');
                $media->where('id',$request->mediaID)->update(['akun_id'=>Auth::user()->id, 'name'=>$filename, 'kategori'=>$kategori, 'jenis'=>$jenis, 'tgl_media'=>$tgl_media]);
            }
            // return $request->all();
                $kontak = new Kontak;
                $kontak->where('id',$request->editID)->update(['akun_id'=>Auth::user()->id, 'alamat'=>$request->alamatEdit, 'no_hp'=>$request->no_hpEdit, 'namaLink'=>$request->namaLinkEdit , 'email'=>$request->emailEdit, 'youtube'=>$request->youtubeEdit, 'instagram'=>$request->instagramEdit, 'twitter'=>$request->twitterEdit, 'media_id'=>$request->mediaID]);

                return redirect::back()->with('success','Data berhasil diubah!');
        }
    }

    public function destroy($id, Request $request) {
        $kontakDB = Kontak::find($id);
        $mediaDB = Media::find($request->media_id);
        $imageDestination = 'storage/kontak/'.$mediaDB->name;
        
        if(File::exists($imageDestination)) {
            File::delete($imageDestination);
        }
        $kontakDB->delete();
        $mediaDB->delete();

        return redirect::back()->with('success','Data berhasil dihapus!');
    }
}
