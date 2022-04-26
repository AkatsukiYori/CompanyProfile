<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\VisiMisi;

// Pre-existing
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class VisiMisiController extends Controller
{
    public function view() {
        return view('admin/visiMisi');
    }

    public function store(Request $request) {
        // return $request->all();
        $validatedData = Validator::make($request->all(),[
            'visi' => 'required',
            'misi' => 'required',
        ]);

        if($validatedData->fails()) {
            $messages = $validatedData->messages();
            return redirect::back()->witherrors($messages);
        }

        $visiMisi = new VisiMisi;
        $visiMisi->visi = $request->visi;
        $visiMisi->misi = $request->misi;
        $visiMisi->save();
        $visiMisi->id;

        return redirect()->with('success', 'Visi misi anda berhasil ditambahkan!');
    }
}
