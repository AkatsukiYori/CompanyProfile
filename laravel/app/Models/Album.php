<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $table = 'album';
    protected $guarded = [];
    protected $appends = ['image'];

    public function album_media(){
        return $this->hasMany('App\Models\AlbumMedia');
    }
    
    public function new_album(){
        return $this->hasMany('App\Models\AlbumMedia')->orderBy('created_at','DESC');
    }
    
    public function getImageAttribute(){
        $image = $this->album_media->where('kategori', 'image')->last();
        if(app()->isLocal()){
            return url('/') . '/storage/album/' . $this->name . '/' . $image->name;
        }else{
            return url('/') . '/api/storage/album/' . $this->name . '/' . $image->name;
        }
    }
}
