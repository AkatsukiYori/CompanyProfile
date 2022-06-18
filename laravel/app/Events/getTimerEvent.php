<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class getTimerEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public $sisa_waktu;
    public $waktu_timer;
    public $jumlah_menit;
    public $jam_mulai;
    public $jam_selesai;
    public $id;

    public function __construct($sisa_waktu, $waktu_timer, $jumlah_menit, $jam_mulai, $jam_selesai, $id)
    {
        $this->sisa_waktu = $sisa_waktu;
        $this->waktu_timer = $waktu_timer;
        $this->jumlah_menit = $jumlah_menit;
        $this->jam_mulai = $jam_mulai;
        $this->jam_selesai = $jam_selesai;
        $this->id = $id;
    }

    public function broadcastWith(){
        return [
            "sisa_waktu" => $this->sisa_waktu,
            "waktu_timer" => $this->waktu_timer,
            "jumlah_menit" => $this->jumlah_menit,
            "jam_mulai" => $this->jam_mulai,
            "jam_selesai" => $this->jam_selesai,
            "id" => $this->id,
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('timerChannel');
    }
}
