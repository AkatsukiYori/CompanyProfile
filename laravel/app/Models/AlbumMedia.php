<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Album;

class AlbumMedia extends Model
{
    use HasFactory;
    protected $table = 'album_media';
    protected $guarded = [];
    protected $appends = ['url'];
    
    public function getUrlAttribute(){
        $album = album::all();
        $albumName = ''; //variabel yang digunakan untuk menampung album name
        
        //looping yang digunakan untuk mengambil nama album sesuai dengan album id pada albumMedia
        foreach($album as $alb){
            if($alb->id == $this->album_id){
                $albumName = $alb->name;
            }
        }
        
        //untuk mencari apakah server ini dijalankan di server atau di local
        if(app()->isLocal()){
            return url('/') . '/storage/album/' . $albumName . '/' . $this->name;
        }else{
            return url('/') . '/api/storage/album/' . $albumName . '/' . $this->name;
        }
    }

    public function album(){
       return $this->belongs(Album::class);
    }

    public function produk() {
        return $this->hasOne('App\Models\Produk');
    }
}
