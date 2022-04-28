<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'product';
    protected $guarded = [];

    public function albumMedia() {
        return $this->belongsTo('App\Models\AlbumMedia');
    }
}
