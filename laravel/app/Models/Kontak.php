<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;

    protected $table = "kontak_kami";
    protected $guarded = [];
    
    public function getImageAttribute(){
        if(app()->isLocal()){
            return url('/') . '/storage/kontak/' . media::all()[0]->name;
        }else{
            return url('/') . '/api/storage/kontak/' . media::all()[0]->name;
        }
    }

    public function media() {
        return $this->belongsTo('App\Models\Media');
    }
}
