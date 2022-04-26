<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    
    public function albumMedia(){
        return $this->hasMany(AlbumMedia::class);
    }
}
