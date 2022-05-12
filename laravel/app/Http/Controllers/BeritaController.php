<?php

namespace App\Http\Controllers;

//models
use App\Models\Berita;
use App\Models\Media;

//pre existsing
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function view() {
        $dataBerita = Berita::with('media')->get();
        return view('admin/berita', [
            'dataBerita' => $dataBerita
        ]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'judulBerita' => 'required',
            'foto' => 'image|required',
            'isiBerita' => 'required',
            'kategori' => 'required',
            'headline' => 'required'
        ]);
        
        $checkCategory = array_map('trim',explode(',',strtolower($request->kategori)));
        $kategori = "";
        
        if(count($checkCategory) > 1){
            foreach($checkCategory as $key => $value){
                if($kategori != ""){
                    $kategori .= ','.$value;
                    continue;
                }
                $kategori = $value;
            }
        }else{
            $kategori = $checkCategory[0];
        }

        if($validator->fails()) {
            $message = $validator->messages();
            return Redirect::back()->withErrors($message);
        }

        global $namaFoto;
        $foto = $request->file('foto');
        $extension = $foto->getClientOriginalExtension();
        $namaFoto = uniqid(). '-' . '.' . $extension;
        $foto->move('storage/berita/', $namaFoto);

        $mediaDB = new Media();
        $mediaDB->akun_id = Auth::user()->id;
        $mediaDB->name= $namaFoto;
        $mediaDB->kategori = "image";
        $mediaDB->jenis= "berita";
        $mediaDB->tgl_media=date('Y-m-d');
        $mediaDB->save();

        $idMedia=$mediaDB->id;

        $beritaDB = new Berita();
        $beritaDB->akun_id = Auth::user()->id;
        $beritaDB->judul = $request->judulBerita;
        $beritaDB->slug = Str::slug($request->judulBerita);
        $beritaDB->headline = $request->headline;
        $beritaDB->kategori = $kategori;
        $beritaDB->views = 0;
        $beritaDB->media_id = $idMedia;
        $beritaDB->isi = $request->isiBerita;
        $beritaDB->tgl_posting = date('Y-m-d');
        $beritaDB->save();

        return Redirect::back()->with(['success' => 'Data created Successfully!'], 200);
    }

    public function edit($id) {
        return Berita::with('media')->where('id', $id)->get();
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'judulBeritaEdit' => 'required',
            'fotoEdit' => 'image',
            'isiBeritaEdit' => 'required',
            'kategoriEdit' => 'required',
            'headlineEdit' => 'required'
        ]);
        
        $checkCategory = array_map('trim',explode(',',strtolower($request->kategoriEdit)));
        $kategori = "";
        
        if(count($checkCategory) > 1){
            foreach($checkCategory as $key => $value){
                if($kategori != ""){
                    $kategori .= ','.$value;
                    continue;
                }
                $kategori = $value;
            }
        }else{
            $kategori = $checkCategory[0];
        }

        if($validator->fails()) {
            $message = $validator->messages();
            return Redirect::back()->withErrors($message);
        }

        if($request->hasFile('fotoEdit')) {
            $namaFoto = '';
            $foto = $request->file('fotoEdit');
            $namaFoto = $request->fotoName;
            $foto->move('storage/berita/', $namaFoto);
    
            $mediaDB = Media::find($request->mediaID);
            $mediaDB->akun_id = Auth::user()->id;
            $mediaDB->name= $namaFoto;
            $mediaDB->kategori = "image";
            $mediaDB->jenis= "berita";
            $mediaDB->tgl_media=date('Y-m-d');
            $mediaDB->update();
        }


        $beritaDB = Berita::find($request->beritaID);
        $beritaDB->akun_id = Auth::user()->id;
        $beritaDB->judul = $request->judulBeritaEdit;
        $beritaDB->slug = Str::slug($request->judulBeritaEdit);
        $beritaDB->headline = $request->headlineEdit;
        $beritaDB->kategori = $kategori;
        $beritaDB->media_id = $request->mediaID;
        $beritaDB->isi = $request->isiBeritaEdit;
        $beritaDB->tgl_posting = date('Y-m-d');
        $beritaDB->update();

        return Redirect::back()->with(['success' => 'Data created Successfully!'], 200);
    }

    public function destroy($id, Request $request) {
        $beritaDB = Berita::find($id);
        $mediaDB = Media::find($request->media_id);
        $imageDestination = 'storage/berita/'.$mediaDB->name;
        
        if(File::exists($imageDestination)) {
            File::delete($imageDestination);
        }
        $beritaDB->delete();
        $mediaDB->delete();

        return Redirect::back()->with(['success' => 'Berita deleted Successfully!'], 200);
    }
}
