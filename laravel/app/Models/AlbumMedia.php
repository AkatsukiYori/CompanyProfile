<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlbumMedia extends Model
{
    use HasFactory;
    protected $table = 'album_media';
    protected $guarded = [];

    public function album(){
       return $this->belongs('App\Models\Album');
    }

    public function produk() {
        return $this->hasOne('App\Models\Produk');
    }
}
