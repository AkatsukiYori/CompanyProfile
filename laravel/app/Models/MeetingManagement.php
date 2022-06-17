<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingManagement extends Model
{
    use HasFactory;

    protected $table = 'meeting_management';
    protected $appends = ['event'];

    public function getEventAttribute(){
    	return implode("-",explode(" ", $this->nama_event));
    }
}
