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
        return (app()->isLocal()) ? url('/') . '/storage/kontak/' . $this->media->name : url('/') . '/api/storage/kontak/' . $this->media->name ;
    }

    public function media() {
        return $this->belongsTo('App\Models\Media');
    }
}
