<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\AlbumMedia;

class GalleryController extends Controller
{
    //funtion yang digunakan untuk menampilkan gallery di bagian landing page
    public function index(){
        $gallery = AlbumMedia::all();
        $maxGallery = $gallery->sortByDesc('created_at')->take(8); //mengambil 8 data dari database
        $dataGallery = []; //array yang digunakan untuk menampung data yang akan dikirim
        
        foreach($maxGallery as $key => $value){
            $dataGallery[$key]['id'] = $key;
            $dataGallery[$key]['type'] = $value->kategori;
            if($value->link){
                $sourceId = explode('/',$value->link);
                $videoId = $sourceId[count($sourceId) - 1];
                $dataGallery[$key]['src'] = $value->link;
                $dataGallery[$key]['videoid'] = $videoId;
            }else{
                $dataGallery[$key]['videoid'] = "";
                $dataGallery[$key]['src'] = $value->image;
            }
        }
        
        return response()->json($dataGallery, 200);
    }
    
    public function ShowAlbums(){
        $albums = Album::with('albumMedia')->get();
        return $albums[0]->image;
    }
}
