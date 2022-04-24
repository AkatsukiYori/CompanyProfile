<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TentangController extends Controller
{
    public function view() {
        return view('admin/tentang_kami');
    }
}
