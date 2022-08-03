<?php

namespace App\Http\Controllers;


// Model
use App\Models\Karyawan;
use App\Models\Media;

// Pre-existing
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

use DataTables;

class KaryawanController extends Controller
{

    public function view() {
        return view('admin/karyawan');
    }

    public function dataTable() {
        $karyawan = Karyawan::with('media')->get()
            ->map(function($data){
                return [
                    'id' => $data->id,
                    'nama' => $data->nama,
                    'no_hp' => $data->no_hp,
                    'email' => $data->email,
                    'instagram' => $data->instagram,
                    'kode' => $data->kode,
                    'kategori' => $data->kategori,
                    'jabatan' => $data->jabatan,
                    'image' => $data->media->name
                ];
            });
        // return $karyawan;

        return DataTables::of($karyawan)
            ->addIndexColumn()
            ->addColumn('aksi', function($data){
                $button = '<button class="btnEdit btn btn-warning" id="'.$data['id'].'"><i class="fas fa-edit"></i></button>';
                $button .= '<button class="btnDelete btn btn-danger" id="'.$data['id'].'"><i class="fas fa-trash"></i></button>';
                return $button;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            "foto" => "required|image",
            "nama" => "required",
            "no_hp" => "required",
            "email" => "required",
            "instagram" => "required",
            "kategori" => "required",
            "jabatan" => "required",
        ]);
        if($validator->fails()) {
            return $validator->errors();
        }

        if($request->hasFile('foto')){
            global $filename;
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $filename = uniqid().'.' . $extension;
            $file->move('storage/karyawan/', $filename);
            $media = new Media;
            $media->akun_id=Auth::user()->id;
            $media->name= $filename;
            $media->kategori = "image";
            $media->jenis= "lainnya";
            $media->tgl_media=date('Y-m-d');
            $media->save();
            $id=$media->id;
        }
        $karyawan = new Karyawan;
        $karyawan->akun_id = Auth::user()->id;
        $karyawan->nama = $request->nama;
        $karyawan->no_hp = $request->no_hp;
        $karyawan->email = $request->email;
        $karyawan->instagram = $request->instagram;
        $karyawan->kode = $this->randomizeCode();
        $karyawan->kategori = strtolower($request->kategori);
        $karyawan->jabatan = $request->jabatan;
        $karyawan->media_id = $id;
        $karyawan->save();

        return response()->json('success');
    }

    public function destroy($id) {
        $karyawanDB = Karyawan::where('id',$id)->with('media')->get();
        $imageDestination = 'storage/karyawan/'.$karyawanDB[0]->media->name;
        
        if(File::exists($imageDestination)) {
            File::delete($imageDestination);
        }

        $karyawanDB[0]->media->delete();
        $karyawanDB[0]->delete();
        return redirect::back()->with('success','Data berhasil dihapus!');
    }

    public function edit($id) {
        return Karyawan::with('media')->where('id',$id)->with('media')->get();
    }

    public function randomizeCode(){
        $randomNum = rand(10000000, 99999999);
        if (Karyawan::where('kode', '=', $randomNum)->exists()){
            $this->randomizeCode();
        }else{
            return $randomNum;
        }
    }

    public function update(Request $request) {
        
        $validator = Validator::make($request->all(), [
            "foto" => "image",
            "nama" => "required",
            "no_hp" => "required",
            "email" => "required",
            "instagram" => "required",
            "kategori" => "required",
            "jabatan" => "required",
        ]);

        if($validator->fails()) {
            $messages = $validator->messages();
            return redirect::back()->witherrors($messages);
        }
        
        $mediaId = '';
        if($request->foto){
            global $filename;
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $filename = uniqid().'-'.'.' . $extension;
            $file->move('storage/karyawan/', $filename);
            $media = new Media;
            $media->akun_id=Auth::user()->id;
            $media->name= $filename;
            $media->kategori = "image";
            $media->jenis= "lainnya";
            $media->tgl_media=date('Y-m-d');
            $media->save();
            $mediaId = $media->id;
        }

        $karyawan = Karyawan::find($request->id);

        $kode = ($karyawan->kode) ? $karyawan->kode : $this->randomizeCode();

        $karyawan->akun_id = auth()->user()->id;
        $karyawan->nama = $request->nama;
        $karyawan->no_hp = $request->no_hp;
        $karyawan->instagram = $request->instagram;
        $karyawan->kode = ($karyawan->kode) ? $karyawan->kode : $this->randomizeCode();
        $karyawan->kategori = strtolower($request->kategori);
        $karyawan->jabatan = $request->jabatan;
        $karyawan->media_id = ($mediaId) ? $mediaId : $karyawan->media_id;
        $karyawan->update();

        return response()->json('success');
    }
}
