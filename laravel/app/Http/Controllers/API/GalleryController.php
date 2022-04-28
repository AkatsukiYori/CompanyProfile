<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\AlbumMedia;

class GalleryController extends Controller
{
    public function index(){
        $gallery = AlbumMedia::all();
        $maxGallery = $gallery->sortByDesc('created_at')->take(8);
        $dataGallery = [];
        foreach($maxGallery as $key => $value){
            $dataGallery[$key]['id'] = $key;
            $dataGallery[$key]['type'] = $value->kategori;
            if($value->link){
                $sourceId = explode('/',$value->link);
                $latestData = $sourceId[count($sourceId) - 1];
                $dataGallery[$key]['src'] = $value->link;
                $dataGallery[$key]['videoid'] = $latestData;
            }else{
                $dataGallery[$key]['videoid'] = "";
                $dataGallery[$key]['src'] = $value->name;
            }
        }
        
        return response()->json($dataGallery, 200);
    }
    
    // public function showAlbums(){
        
    // }
}
