<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Faqs;

class FaqsController extends Controller
{
    public function index(){
        $faqs = Faqs::All();
        $faq = [];
        foreach($faqs as $key => $value){
            $faq[$key]['id'] = $key;
            $faq[$key]['question'] = $value->pertanyaan;
            $faq[$key]['answer'] = $value->jawaban;
        }
        
        return response()->json($faq, 200);
    }
}
