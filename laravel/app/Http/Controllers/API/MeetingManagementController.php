<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MeetingManagement;
use Carbon\Carbon;

class MeetingManagementController extends Controller
{
    public function index(){

        $meeting = MeetingManagement::where('status', 'aktif')->first();
        if($meeting){
            $slug = Carbon::now()->format('Y-m-').$meeting->event;
            $this->id = $meeting->id;
            $meetingData = [
                "id" => $meeting->id,
                "nama_event" => $meeting->event,
                "slug" => $meeting->slug,
            ];
        }else{
            $meetingData = 'Maaf, sekarang belum ada meeting yang sedang aktif';
        }

        return response()->json($meetingData);
        
    }

    public function startTimer($id){
        $meeting = MeetingManagement::find($id);
        $waktu_timer = (!$meeting->waktu_timer) ? 'Waktu Presentasi belum dimulai' : $meeting->waktu_timer ;

        return response()->json($waktu_timer);
    }

}
