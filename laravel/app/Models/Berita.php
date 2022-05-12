<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';
    protected $guarded = [];
    protected $appends = ['image'];
    
    public function getImageAttribute(){
        return (app()->isLocal()) ? url('/') . '/storage/media/' . $this->media->name : url('/') . '/api/storage/media/' . $this->media->name;
    }

    public function media() {
        return $this->belongsTo('App\Models\Media');
    }
}
