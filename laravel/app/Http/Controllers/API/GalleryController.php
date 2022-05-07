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
        $img = new ImageStructure();
        foreach(Album::orderBy('created_at', 'DESC')->get() as $key => $value){
            $albums[$key]['id'] = $key;
            $albums[$key]['title'] = $value->name;
            $albums[$key]['image'] = $value->image[0]->image;
            $albums[$key]['date'] = date_format(date_create(explode(" ", $value->tgl_album)[0]),'j F Y');
            // $albums[$key]['tanggal'] = Carbon::parse($value->created_at)->format('j F Y');
            $albums[$key]['description'] = $value->deskripsi;
            $albums[$key]['album_media'] = $img->AlbumReform($value->new_album);
        }
        
        return response()->json($albums, 200);
    }
    
    public function GetAlbum($name){
        $img = new ImageStructure();
        $album = Album::orderBy('created_at','DESC')->where('name', 'like', '%' . $name . '%')->get();
        foreach($album as $key => $value){
            $albums[$key]['id'] = $key;
            $albums[$key]['title'] = $value->name;
            $albums[$key]['image'] = $value->image[0]->image;
            $albums[$key]['date'] = date_format(date_create(explode(" ", $value->tgl_album)[0]),'j F Y');
            $albums[$key]['description'] = $value->deskripsi;
            $albums[$key]['album_media'] = $img->AlbumReform($value->new_album);
        }
        
        
        return response()->json($albums, 200);
    }
}
