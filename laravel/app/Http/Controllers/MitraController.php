<?php

namespace App\Http\Controllers;
//models
use App\Models\Mitra;
use App\Models\Media;

//pre existsing
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class MitraController extends Controller
{
    public function view() {
        $data = Mitra::with('media')->get();
        return view('admin/mitra',[
            'mitras' => $data
        ]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png'
        ]);
        if($validator ->fails()) {
            $messages = $validator->messages();
            return Redirect::back()->withErrors($messages);
        }

        $imageName = '';
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $imageName = uniqid(). '-' . '.' . $extension;
        $image->move('storage/mitra/', $imageName);

        $mediaDB = new Media();
        $mediaDB->akun_id = Auth::user()->id;
        $mediaDB->name= $imageName;
        $mediaDB->kategori = "image";
        $mediaDB->jenis= "mitra";
        $mediaDB->tgl_media=date('Y-m-d');
        $mediaDB->save();

        $idMedia=$mediaDB->id;

        $mitraDB = new Mitra();
        $mitraDB->akun_id = Auth::user()->id;
        $mitraDB->name = $request->name;
        $mitraDB->media_id = $idMedia;
        $mitraDB->save();

        return Redirect::back()->with(['success' => 'Data created Successfully!'], 200);
    }


    public function edit($id) {
        return Mitra::with('media')->where('id', $id)->get();
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
            'nameEdit' => 'required',
            'imageEdit' => 'mimes:jpg,jpeg,png'
        ]);

        if($validator->fails()) {
            $messages = $validator->messages();
            return Redirect::back()->withErrors($messages);
        }
        

        if($request->hasFile('imageEdit')) {
            $imageName = '';
            $image = $request->file('imageEdit');
            $extension = $image->getClientOriginalExtension();
            $imageName = $request->imageName;
            $image->move('storage/mitra/', $imageName);

            $mediaDB = Media::find($request->mediaID);
            $mediaDB->akun_id = Auth::user()->id;
            $mediaDB->kategori = "image";
            $mediaDB->jenis = "mitra";
            $mediaDB->tgl_media = date('Y-m-d');
            $mediaDB->update();
        }

        $mitraDB = Mitra::find($request->mitraID);
        $mitraDB->akun_id = Auth::user()->id;
        $mitraDB->name = $request->nameEdit;
        $mitraDB->media_id = $request->mediaID;
        $mitraDB->update();

        return Redirect::back()->with(['success' => 'Data updated Successfully!'], 200);

    }

    public function destroy(Request $request, $id) {
        $mitraDB = Mitra::find($id);
        $mediaDB = Media::find($request->media_id);
        $imageDestination = 'storage/mitra/'.$mediaDB->name;
        
        if(File::exists($imageDestination)) {
            File::delete($imageDestination);
        }
        $mitraDB->delete();
        $mediaDB->delete();

        return Redirect::back()->with(['success' => 'Mitra deleted Successfully!'], 200);
    }
}
