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
            "id" => $head[0]->id,
            "title" => $head[0]->judul,
            "description" => $head[0]->isi,
            "image" => $head[0]->image,
            "slug" => $head[0]->slug,
            "kategori" => explode(',',$head[0]->kategori),
            "datetime" => date_format(date_create($head[0]->created_at), 'j F Y, H:i T'),
        ];
        
        $news = [];
        $category = [];
        $randomNews = [];
        
        //randomNews
        foreach($random as $value){
            if($value->id == $head[0]->id){
                continue;
            }
            $randomArray = [
                "id" => $value->id,
                "title" => $value->judul,
                "description" => $value->isi,
                "slug" => $value->slug,
                "image" => $value->image,
                "datetime" => date_format(date_create($value->created_at), 'j F Y, H:i T'),
                "categories" => explode(',',$value->kategori),
                "date" => date_format(date_create($value->tgl_posting), 'j F Y')
            ];
            
            array_push($randomNews, $randomArray);
        }
        
        
        //kategori
        $arrayKategori = []; $kategoriCounter = 0;
        
        foreach($berita as $value){
            $kategori = explode(',', $value->kategori);
            foreach($kategori as $cat){
                array_push($arrayKategori, $cat);
            }
            $arrayKategori = array_unique($arrayKategori);
        }
        
        foreach($arrayKategori as $value){
            $categoryArray = [
                "id" => $kategoriCounter,
                "text" => $value
            ];
            array_push($category, $categoryArray);
            $kategoriCounter++;  
        }
        
        //berita
        foreach($berita as $value){
            if($head[0]->id == $value->id){
                $this->headId = $head[0]->id;
                continue;
            }
            
            $newsArray = [
                "id" => $value->id,
                "title" => $value->judul,
                "description" => $value->isi,
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
    
    public function getBerita($name){
        $berita = Berita::orderBy('created_at','DESC')->where('judul', 'like', '%' . $name . '%')->get();
        
        $news = [];
        
        foreach($berita as $value){
            $newsArray = [
                "id" => $value->id,
                "title" => $value->judul,
                "description" => $value->isi,
                "slug" => $value->slug,
                "image" => $value->image,
                "datetime" => date_format(date_create($value->created_at), 'j F Y, H:i T'),
                "categories" => explode(',',$value->kategori),
                "date" => date_format(date_create($value->tgl_posting), 'j F Y')
            ];
            
            array_push($news, $newsArray);
        }
        
        return response()->json($news, 200);
    }
    
    public function getKategori($kategori){
        $berita = Berita::all();
        $category = [];
        foreach($berita as $key => $value){
            $categories = explode(',',$value->kategori);
            foreach($categories as $kategoriValue){
                if($kategoriValue == $kategori){
                    $categoryArray = [
                        "id" => $value->id,
                        "title" => $value->judul,
                        "slug" => $value->slug,
                        "image" => $value->image,
                        "description" => $value->isi,
                        "categories" => explode(',',$value->kategori),
                        "date" => date_format(date_create($value->tgl_posting), 'j F Y')
                    ];
                    
                    array_push($category, $categoryArray);
                }
            }
        }
        
        return $category;
    }
    
    public function updateViews($id){
        $berita = Berita::find($id);
        $berita->views += 1;
        $berita->update();
        
        return response()->json(['message' => "views anda berjumlah ". $berita->views], 200);
    }
    
    public function getDetail($id){
        $berita = Berita::find($id);
        $news = [
            "id" => $berita->id,
            "title" => $berita->judul,
            "description" => $berita->isi,
            "slug" => $berita->slug,
            "image" => $berita->image,
            "datetime" => date_format(date_create($berita->created_at), 'j F Y, H:i T'),
            "categories" => explode(',',$berita->kategori),
            "date" => date_format(date_create($berita->tgl_posting), 'j F Y')
        ];
        
        return response()->json($news, 200);
    }
}
