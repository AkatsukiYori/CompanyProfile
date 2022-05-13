<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;

class BeritaController extends Controller
{
    public $headlineId;
    
    public function index(){
        $berita = Berita::orderBy('created_at', 'DESC')->get();
        $head = Berita::orderBy('created_at', 'DESC')->where('headline', 'y')->take(1)->get();
        $random = Berita::inRandomOrder()->get();
        
        $headline = [
            "title" => $head[0]->judul,
            "description" => $head[0]->isi_berita,
            "image" => $head[0]->image
        ];
        
        $news = [];
        $category = [];
        $randomNews = [];
        
        foreach($random as $key => $value){
            if($value->id == $head[0]->id){
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
        
        $arrayKategori = [];
        
        foreach($berita as $key => $value){
            $kategori = explode(',', $value->kategori);
            foreach($kategori as $kat => $cat){
                array_push($arrayKategori, $cat);
            }
            $arrayKategori = array_unique($arrayKategori);
        }
        
        foreach($arrayKategori as $key => $value){
            $categoryArray = [
                "id" => $key,
                "text" => $value
            ];
            array_push($category, $categoryArray);   
        }
        
        foreach($berita as $key => $value){
            if($head[0]->id == $value->id){
                $this->headId = $head[0]->id;
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
