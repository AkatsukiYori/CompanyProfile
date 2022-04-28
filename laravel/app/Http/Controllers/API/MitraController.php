<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Mitra;

class MitraController extends Controller
{
    public function index(){
        return Mitra::all();
    }
}
