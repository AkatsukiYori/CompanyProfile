<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MeetingManagement;
use App\Events\getTimerEvent;
use Carbon\Carbon;

class MeetingManagementController extends Controller
{
    public function index(){

        $meeting = MeetingManagement::orderBy('created_at','DESC')->get();

        if(!$meeting){
            return response()->json(['message' => 'Maaf, sekarang belum ada meeting yang sedang aktif'],500);
        }else{
            $meetings = [];
            foreach($meeting as $key => $value){
                $meetings[$key]['id'] = $value->id;
                $meetings[$key]['nama_event'] = $value->nama_event;
                $meetings[$key]['jam_mulai'] = $value->jam_mulai;
                $meetings[$key]['jam_selesai'] = $value->jam_selesai;
                $meetings[$key]['jumlah_menit'] = $value->jumlah_menit;
                $meetings[$key]['waktu_timer'] = $value->waktu_timer;
                $meetings[$key]['slug'] = $value->slug;
                $meetings[$key]['kode'] = $value->kode;
            }
            return response()->json($meetings);
        }
        
    }

    public function startTimer($id){
        $meeting = MeetingManagement::find($id);

        $waktu_timer = (!$meeting->waktu_timer) ? 'Waktu Presentasi belum dimulai' : event(new getTimerEvent($meeting->sisa_waktu, $meeting->waktu_timer, $meeting->jumlah_menit, $meeting->jam_mulai, $meeting->jam_selesai, $meeting->id)); ;

        $waktuNow = strtotime(now()->format('H:i:s'));
        $carbon = strtotime(explode(' ',$meeting->waktu_timer)[1]);
        return response()->json($carbon);
    }

}
