<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Model
use App\Models\Produk;
use App\Models\AlbumMedia;

// Pre-existing
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProdukControllerD extends Controller
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
