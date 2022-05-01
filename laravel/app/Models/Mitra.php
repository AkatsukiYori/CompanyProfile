<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;
    protected $table = "mitra";
    protected $guarded = [];
    protected $appends = ['image'];
    
    public function getImageAttribute(){
        return (app()->isLocal()) ? url('/') . '/storage/mitra/' . $this->media->name : url('/') . '/api/storage/mitra/' . $this->media->name;
    }

    public function media() {
        return $this->belongsTo('App\Models\Media');
    }
}
