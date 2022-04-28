<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Model
use App\Models\Produk;
use App\Models\AlbumMedia;

class ProdukController extends Controller
{
    public function view() {
        return view('admin/produk');
    }

    public function store(Request $request) {

    }

    public function edit($id) {

    }

    public function update(Request $request) {

    }

    public function destroy($id) {

    }
}
