<?php

namespace App\Http\Controllers;

//models
use App\Models\Tentang;

//Pre existing
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TentangController extends Controller
{
    public function view() {
        return view('admin/tentangKami');
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            "judul_tentang" => "required",
            "deskripsi" => "required",
            "gambar" => "required|mimes:jpg,jpeg,png",
        ]);

        if($validator ->fails()){
            $messages = $validator->messages();
            return $messages;
        }
        if($request->hasFile('gambar')){
            global $filename;
            $file = $request->file('gambar_activity');
            $extension = $file->getClientOriginalExtension();
            $filename = uniqid().'-'.'.' . $extension;
            $file->move('storage/activity/', $filename);
            }
            $activity = new Activity;
            $activity->divisi_karyawan_id= Auth::user()->karyawan->id;
            $activity->gambar_activity=$filename;
            $activity->project_id= $request->input('project');
            $activity->nama_activity= $request->input('nama_activity');
            $activity->deskripsi_activity= $request->input('desc_activity');
            $activity->jam_mulai= $request->input('jam_mulai');
            $activity->tanggal= $request->input('tgl');
            $activity->deadline= $request->input('deadline');
            $activity->status= $request->input('status');
            $activity->category= $request->input('category');
            $activity->save();
             return 'Data Inserted'; 
        $tentang = new Tentang;
        $tentang->

    }
}
