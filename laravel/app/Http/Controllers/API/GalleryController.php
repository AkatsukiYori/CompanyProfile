<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\AlbumMedia;
use App\Http\Controllers\API\functions\ImageStructure;

class GalleryController extends Controller
{
    //funtion yang digunakan untuk menampilkan gallery di bagian landing page
    public function index(){
        $img = new ImageStructure();
        $gallery = AlbumMedia::all();
        $maxGallery = $gallery->sortBy('created_at', SORT_REGULAR, true)->take(8); //mengambil 8 data dari database
        $dataGallery = $img->AlbumReform($maxGallery); //array yang digunakan untuk menampung data yang akan dikirim
        
        return response()->json($dataGallery, 200);
    }
    
    public function ShowAlbums(){
        $img = new ImageStructure();
        foreach(Album::all() as $key => $value){
            $albums[$key]['id'] = $key;
            $albums[$key]['title'] = $value->name;
            $albums[$key]['image'] = $value->image[0]->image;
            $albums[$key]['date'] = date_format(date_create(explode(" ", $value->tgl_album)[0]),'j F Y');
            $albums[$key]['description'] = $value->deskripsi;
            $albums[$key]['album_media'] = $img->AlbumReform($value->album_media);
        }
        
        return response()->json($albums, 200);
    }
}
