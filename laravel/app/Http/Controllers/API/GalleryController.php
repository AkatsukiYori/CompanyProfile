<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\AlbumMedia;
use App\Http\Controllers\API\functions\ImageStructure;
use Carbon\Carbon;

class GalleryController extends Controller
{
    //funtion yang digunakan untuk menampilkan gallery di bagian landing page
    public function index(){
        $img = new ImageStructure();
        $gallery = AlbumMedia::orderBy('created_at', 'DESC')->get();
        $maxGallery = $gallery->take(8); //mengambil 8 data dari database
        $dataGallery = $img->AlbumReform($maxGallery); //array yang digunakan untuk menampung data yang akan dikirim
        
        return response()->json($dataGallery, 200);
    }
    
    public function ShowAlbums(){
        foreach(Album::orderBy('created_at', 'DESC')->get() as $key => $value){
            $albums[$key]['id'] = $value->id;
            $albums[$key]['title'] = $value->name;
            $albums[$key]['image'] = $value->image;
            $albums[$key]['date'] = date_format(date_create(explode(" ", $value->tgl_album)[0]),'j F Y');
        }
        
        return response()->json($albums, 200);
    }
    
    public function GetAlbum($name){
        $img = new ImageStructure();
        $album = Album::orderBy('created_at','DESC')->where('name', 'like', '%' . $name . '%')->get();
        if($album->isEmpty()){
            return response()->json(['message' => 'data not found'],500);
        }else{
            $albums = [];
            foreach($album as $key => $value){
                $albums[$key]['id'] = $value->id;
                $albums[$key]['title'] = $value->name;
                $albums[$key]['kategori'] = $value->image[0]->kategori;
                $albums[$key]['image'] = $value->image[0]->image;
                $albums[$key]['date'] = date_format(date_create(explode(" ", $value->tgl_album)[0]),'j F Y');
            }
            
            return response()->json($albums, 200);
        }
    }
    
    public function getDetailAlbum($id){
        $img = new ImageStructure();
        $album = Album::find($id);
        $albums['id'] = $album->id;
        $albums['title'] = $album->name;
        $albums['image'] = $album->image[0]->image;
        $albums['date'] = date_format(date_create(explode(" ", $album->tgl_album)[0]),'j F Y');
        $albums['description'] = $album->deskripsi;
        $albums['album_media'] = $img->AlbumReform($album->new_album);
            
        return response()->json($albums, 200);
    }
}
