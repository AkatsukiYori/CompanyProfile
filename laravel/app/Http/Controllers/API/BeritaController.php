<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;

class BeritaController extends Controller
{
    public $headlineId;
    
    public function index(){
        $berita = Berita::orderBy('created_at', 'DESC')->take(5)->get();
        $headline = Berita::orderBy('created_at', 'DESC')->where('headline', 'y')->take(1)->get();
        $random = Berita::inRandomOrder()->get();
        
        $news = [];
        $category = [];
        $randomNews = [];
        
        foreach($random as $key => $value){
            if($value->id == $headline[0]->id){
                continue;
            }
            $randomArray = [
                "id" => $key,
                "title" => $value->judul,
                "image" => $value->image,
                "date" => date_format(date_create($value->tgl_posting), 'j F Y')
            ];
            
            array_push($randomNews, $randomArray);
        }
        
        foreach($berita as $key => $value){
            if(!in_array($value->kategori, $category)){
                array_push($category, $value->kategori);
            }
        }
        
        foreach($berita as $key => $value){
            if($headline[0]->id == $value->id){
                $this->headlineId = $headline[0]->id;
                continue;
            }
            
            $newsArray = [
                "id" => $key,
                "title" => $value->judul,
                "description" => $value->isi_berita,
                "slug" => $value->slug,
                "image" => $value->image,
                "datetime" => date_format(date_create($value->created_at), 'j F Y, H:i T'),
                "categories" => explode(',',$value->kategori)
            ];
            
            array_push($news, $newsArray);
        }
        
        return response()->json([
            "headline" => $headline,
            "berita" => $news,
            "category" => $category,
            "random" => $randomNews
        ], 200);
    }
    
    // public function randomize($array, $berita, $headline, $randoms = []){
    //     foreach($array as $key => $value){
    //         if($value->id == $headline) continue;
    //         foreach($berita as $newsKey => $news){
    //             if($value->id == $news->id){
    //                 break;
    //             }else{
    //                 if(in_array($value->id,$randoms)){
    //                     continue;
    //                 }
    //                 $randoms[] = $value->id;
    //             }
    //         }
    //         if(count($randoms) > 1) break;
    //     }
    //     return $randoms;
    // }
}
