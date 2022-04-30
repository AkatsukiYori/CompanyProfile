<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawan';
    protected $guarded = [];
    protected $appends = ['image'];
    
    public function getImageAttribute(){
        return (app()->isLocal()) ? url('/') . '/storage/karyawan/' . $this->media->name : url('/') . '/api/storage/karyawan/' . $this->media->name ;
    }

    public function media() {
        return $this->belongsTo('App\Models\Media');
    }
}
