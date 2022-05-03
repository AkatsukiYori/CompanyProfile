<?php
namespace App\Http\Controllers\API\functions;

class ImageStructure {
    
    public function AlbumReform($album_media, $album = []){
        
        foreach($album_media as $key => $value){
            $album[$key]['id'] = $key;
            $album[$key]['type'] = $value->kategori;
            if($value->link){
                $sourceId = explode('/',$value->link);
                $videoId = $sourceId[count($sourceId) - 1];
                $album[$key]['src'] = $value->link;
                $album[$key]['videoid'] = $videoId;
            }else{
                $album[$key]['videoid'] = "";
                $album[$key]['src'] = $value->image;
            }
        }
        
        return $album;
    }
}