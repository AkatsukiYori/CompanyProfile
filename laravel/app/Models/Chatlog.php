<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chatlog extends Model
{
    use HasFactory;

    protected $table = 'chatlog';

    public function event() {
        return $this->belongsTo('App\Models\MeetingManagement', 'event_id');
    }

    public function user(){
    	return $this->belongsTo('App\Models\User', 'user_id');
    }
}
