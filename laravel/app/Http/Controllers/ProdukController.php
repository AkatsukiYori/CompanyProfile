<?php

namespace App\Http\Controllers;

// Model
use App\Models\Produk;
use App\Models\Media;

// pre existing
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProdukController extends Controller
{
    public function view() {
        $data = Produk::with('media')->get();
        return view('admin/produk', [
            'produks' => $data
        ]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png'
        ]);
        if($validator->fails()) {
            $messages = $validator->messages();
            return Redirect::back()->withErrors($messages);
        }

        $fotoName = '';
        $foto = $request->file('foto');
        $extension = $foto->getClientOriginalExtension();
        $fotoName = uniqid(). '-' . '.' . $extension;
        $foto->move('storage/produk/', $fotoName);

        $mediaDB = new Media();
        $mediaDB->akun_id = Auth::user()->id;
        $mediaDB->name = $fotoName;
        $mediaDB->kategori = "image";
        $mediaDB->jenis = "product";
        $mediaDB->tgl_media = date('Y-m-d');
        $mediaDB->save();

        $idMedia=$mediaDB->id;

        $produkDB = new Produk();
        $produkDB->akun_id = Auth::user()->id;
        $produkDB->name = $request->name;
        $produkDB->media_id = $idMedia;
        $produkDB->deskripsi = $request->deskripsi;
        $produkDB->save();

        return Redirect::back()->with(['success' => 'Data created Successfully!'], 200);
    }


    public function edit($id) {
        return Produk::with('media')->where('id', $id)->get();
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'nameEdit' => 'required',
            'deskripsiEdit' => 'required',
            'fotoEdit' => 'mimes:jpg,jpeg,png'
        ]);
        if($validator->fails()) {
            $messages = $validator->messages();
            return Redirect::back()->withErrors($messages);
        }

        if($request->hasFile('fotoEdit')) {
            $fotoName = '';
            $foto = $request->file('fotoEdit');
            $extension = $foto->getClientOriginalExtension();
            $fotoName = $request->fotoName;
            $foto->move('storage/produk/', $fotoName);

            $mediaDB = Media::find($request->mediaID);
            $mediaDB->akun_id = Auth::user()->id;
            $mediaDB->kategori = "image";
            $mediaDB->jenis = "product";
            $mediaDB->tgl_media = date('Y-m-d');
            $mediaDB->update();
        }
        $produkDB = Produk::find($request->produkID);
        $produkDB->akun_id = Auth::user()->id;
        $produkDB->name = $request->nameEdit;
        $produkDB->deskripsi = $request->deskripsiEdit;
        $produkDB->media_id = $request->mediaID;
        $produkDB->update();

        return Redirect::back()->with(['success' => 'Data updated Successfully!'], 200);
    }


    public function destroy($id, Request $request) {
        $produkDB = Produk::find($id);
        $mediaDB = Media::find($request->media_id);
        $fotoDestination = 'storage/produk/'.$mediaDB->name;
        
        if(File::exists($fotoDestination)) {
            File::delete($fotoDestination);
        }
        $produkDB->delete();
        $mediaDB->delete();

        return Redirect::back()->with(['success' => 'Mitra deleted Successfully!'], 200);
    }
}
