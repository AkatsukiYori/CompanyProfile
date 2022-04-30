<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $guarded = [];
    protected $appends = ['image'];
    
    public function getImageAttribute(){
        return (app()->isLocal()) ? url('/') . '/storage/produk/' . $this->media->name : url('/') . '/api/storage/produk/' . $this->media->name;
    }

    public function media() {
        return $this->belongsTo('App\Models\Media');
    }
}
