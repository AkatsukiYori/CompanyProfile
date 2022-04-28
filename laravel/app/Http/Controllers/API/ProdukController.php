<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index(){
        $produk = Produk::with('media')->get();
        $product = [];
        foreach($produk as $key => $value){
            $product[$key]['id'] = $key;
            $product[$key]['foto'] = $value->media->name;
        }
        
        return $product;
    }
}
