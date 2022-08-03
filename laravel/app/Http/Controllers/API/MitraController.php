<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Mitra;

class MitraController extends Controller
{
    public function index(){
        $mitras = Mitra::with('media')->get();
        $totalData = count($mitras);
        $counter = 0;
        $mitraPart1 = [];
        $mitraPart2 = [];
        
        foreach($mitras as $key => $value){
            $counter+=1;
            if($counter == 1){
                $mitraPart1[$key]['id'] = $key;
                $mitraPart1[$key]['image'] = $value->image;
            }else{
                $mitraPart2[$key]['id'] = $key;
                $mitraPart2[$key]['image'] = $value->image;
                $counter = 0;
            }
        }

        return response()->json(["mitra1" => $mitraPart1, "mitra2" => $mitraPart2], 200);
    }
}