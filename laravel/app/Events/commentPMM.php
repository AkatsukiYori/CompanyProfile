<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class commentPMM
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $event_id;
    public $pengirim;
    public $isi_message;
    public $waktu_kirim;
    public $id;

    public function __construct($event_id, $pengirim, $isi_message, $waktu_kirim, $id)
    {
        $this->event_id = $event_id;
        $this->pengirim = $pengirim;
        $this->isi_message = $isi_message;
        $this->waktu_kirim = $waktu_kirim;
        $this->id = $id;
    }

    public function broadcastWith(){
        return [
            "event_id" => $this->event_id,
            "pengirim" => $this->pengirim,
            "isi_message" => $this->isi_message,
            "waktu_kirim" => $this->waktu_kirim,
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
        return new Channel('commentChannel');
    }
}
