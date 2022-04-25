<?php

namespace App\Http\Controllers;
//modals
use App\Models\Faqs;
//pre existing
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class FaqsController extends Controller
{
    public function view() {
        $data = Faqs::all();
        return view('admin/faqs', [
            'faqs' => $data
        ]);
    }

    public function store(Request $request) {
        $database_FAQ = new Faqs();
        $validator = Validator::make($request->all(), [
            'pertanyaan_faq' => 'required',
            'jawaban_faq' => 'required'
        ]);
        if($validator->fails()) {  
            $messages = $validator->messages();
            return Redirect::back()->withErrors($$messages);
        }
        $database_FAQ->akun_id = Auth::user()->id;
        $database_FAQ->pertanyaan = $request->pertanyaan_faq;
        $database_FAQ->jawaban = $request->jawaban_faq;

        $database_FAQ->save();
        return redirect('/faqs')->with(['success' => 'Data created Successfully!'], 200);
    }
}
