<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tentang extends Model
{
    use HasFactory;
    protected $table='tentang_kami';
    protected $guarded=[];
    protected $appends = ['image'];
    
    public function getImageAttribute(){
        return (app()->isLocal()) ? url('/') . '/storage/tentang/' . $this->media->name : url('/') . '/api/storage/tentang/' . $this->media->name ;
    }

    public function media(){
        return $this->BelongsTo('App\Models\Media');	
    }
}
