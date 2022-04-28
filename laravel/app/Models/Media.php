<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $table='media';
    protected $guarded=[];

    public function tentang(){
        return $this->hasOne('App\Models\Tentang');
    }
    public function kontak() {
        return $this->hasOne('App\Models\Kontak');
    }
    public function karyawan() {
        return $this->hasOne('App\Models\Karyawan');
    }
    public function mitra() {
        return $this->hasMany('App\Models\Mitra');
    }
}
