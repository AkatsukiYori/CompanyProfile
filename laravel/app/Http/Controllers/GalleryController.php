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
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    public function view() {
        $album = Album::with('album_media')->withCount([
            'album_media as jumlah'=>function ($query) {}
        ])->get();
        // return $album;
        return view('admin/gallery',['album'=>$album]);
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
            return back()->withErrors($messages);
        }
        
        $Album = new Album;
        $Album->akun_id = Auth::user()->id;
        $Album->name = str_replace(' ','_', $request->nama_album);
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
            $file->move('storage/album/'.str_replace(' ','_', $request->nama_album), $filename);
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
            return back()->with('success', 'Data Berhasil Ditambahkan');
    }
    public function edit($id){
        return Album::find($id);
    }
    public function update(Request $request){
        // return $request->all();
        $validator = Validator::make($request->all(), [
            "nama_album" => "required",
            "deskripsi" => "required",
            ]);

        if($validator ->fails()){
            $messages = $validator->messages();
            return back()->withErrors($messages);
        }
        $id=$request->id;
        $Album = Album::where('id',$id)->update(['name'=>str_replace(' ','_', $request->nama_album),'deskripsi'=>$request->deskripsi]);
        rename("storage/album/".$request->foldername, "storage/album/".str_replace(' ','_', $request->nama_album));
        return back()->with('success', 'Data Berhasil Diupdate');
    }
    
    public function delete($id){
        $albumDB = Album::find($id);
        $dataAlbumMedia = AlbumMedia::where('album_id', $id)->get();
        $arrayMedia = [];
        foreach($dataAlbumMedia as $data) {
            $arrayMedia[] = $data->name;
        }
        $arrayTest = [];
        for($i = 0; $i < count($arrayMedia); $i++) {
            $imageDestination = 'storage/album/'. $albumDB->name ."/".$arrayMedia[$i];
            if(File::exists($imageDestination)) {
                File::delete($imageDestination);
            }
            $arrayTest[] = $imageDestination;
        }
        $folderDestination = 'storage/album/'.$albumDB->name;
        if(File::exists($folderDestination)) {
            File::deleteDirectory($folderDestination);
        }
        $albumDB->delete();
        AlbumMedia::where('album_id', $id)->delete();
    }
    public function detail($id){
        $album = Album::with('album_media')->where('id',$id)->get();
        // return $album;
        return view('admin/galleryDetail',['album'=>$album]);
    }
    public function detailStore(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            "jenis" => "required",
        ]);
        
        if($validator ->fails()){
            $messages = $validator->messages();
            return back()->withErrors($messages);
        }
        if($request->hasFile('file')){
            foreach($request->file as $files){
            global $filename;
            $file = $files;
            $extension = $file->getClientOriginalExtension();
            $filename = uniqid().'-'.'.' . $extension;
            $file->move('storage/album/'.$request->judul, $filename);
            $media = new AlbumMedia;
            $media->akun_id=Auth::user()->id;
            $media->name= $filename;
            $media->album_id= $request->id;
            $media->kategori = $request->jenis;
            $media->save();
            return back()->with('success', 'Data Berhasil Ditambahkan');
            }
        }else{
            $media = new AlbumMedia;
            $media->akun_id=Auth::user()->id;
            $media->album_id= $request->id;
            $media->kategori= $request->jenis;
            $media->name=$request->judul_video;
            $media->link=$request->link;
            $media->save();
            return back()->with('success', 'Data Berhasil Ditambahkan');
        }

    }
    public function detailEdit($id){
        // return $id;
        return AlbumMedia::find($id);
    }
    public function detailUpdate(Request $request){
        // dd($request->all());
        $id=$request->id;
        if($request->hasFile('file')){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = $request->filename;
            $file->move('storage/album/'.$request->judul, $filename);
            return back()->with('success', 'Data Berhasil Update');
        }
        if($request->judul_video != null){
            $media =AlbumMedia::where('id',$id)->update(['name'=>$request->judul_video,'link'=>$request->link]);
            return back()->with('success', 'Data Berhasil Update');
        }
    }
    public function detailDelete($id, Request $request){
        $dataAlbumMedia = AlbumMedia::where('id',$id)->get();
        $imageDestination = 'storage/album/'.$request->name_album.'/'.$dataAlbumMedia[0]->name;
        
        if(File::exists($imageDestination)) {
            File::delete($imageDestination);
        }
        AlbumMedia::where('id',$id)->delete();
    }
}
