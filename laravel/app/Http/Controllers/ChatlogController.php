<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\MeetingManagement;
use App\Models\Chatlog;
use App\Events\commentPMM;
use DataTables;
use Carbon\Carbon;

class ChatlogController extends Controller
{
    public function index(){
        $chatlog = Chatlog::orderBy('created_at', 'DESC')->get();

    	return view('admin.meetingManagement');
    }

    public function store(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'event_id' => 'required',
    		'isi_message' => 'required',
    	]);

    	if($validator->fails()){
    		return Redirect::back()->withErrors($validator->messages());
    	}

    	$chatlog = new Chatlog();
        $chatlog->event_id = $request->event_id;
    	$chatlog->pengirim = 'superadmin';
    	$chatlog->isi_message = $request->isi_message;
        $chatlog->save();

        event(new commentPMM($chatlog->event_id, $chatlog->pengirim, $chatlog->isi_message, $chatlog->created_at, $chatlog->id));
        
        return Redirect::back()->with('success', 'Data Berhasil dimasukkan');
    }
}
