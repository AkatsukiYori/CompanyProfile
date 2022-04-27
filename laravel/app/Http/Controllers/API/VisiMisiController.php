<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\VisiMisi;

class VisiMisiController extends Controller
{
    public function index(){
        return VisiMisi::All();
    }
}
