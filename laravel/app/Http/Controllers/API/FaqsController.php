<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Faqs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FaqsController extends Controller
{
    public function index(){
        $faqs = Faqs::where('tampil', '=', 'tampil')->get();
        $faq = [];
        foreach($faqs as $key => $value){
            $faq[$key]['id'] = $key;
            $faq[$key]['question'] = $value->pertanyaan;
            $faq[$key]['answer'] = $value->jawaban;
        }
        
        return response()->json($faq, 200);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'pertanyaan' => 'required',
        ]);
        if($validator->fails()) {  
            $messages = $validator->messages();
            return Redirect::back()->withErrors($messages);
        }
        $database_FAQ = new Faqs();
        $database_FAQ->akun_id = 1;
        $database_FAQ->tampil = 'tidak';
        $database_FAQ->pertanyaan = $request->pertanyaan;
        if($database_FAQ->save()){
            return redirect('/faqs')->with(['success' => 'Berhasil'], 200);
        }else{
            return redirect('/faqs')->with(['failed' => 'Gagal'], 200);
        }
    }
}
