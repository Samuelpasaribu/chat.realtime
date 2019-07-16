<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PrivateEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $UserChat;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($UserChat)
    {
        $this->UserChat = $UserChat;
    }

    public function broadcastWith()
    {
        $this->UserChat->load('user');

        // return ['grupUser' => $this->grupUser->toArray()];

        return [
            'chat' => $this->UserChat->chat,
            'created_at' => $this->UserChat->created_at,
            'user' => [
                'name' => $this->UserChat->user->name
            ], 
            'user_id_tujuan' => $this->UserChat->user_id_tujuan,
            'user_id' => $this->UserChat->user_id,
            
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // return new PrivateChannel('privatechat.'.$this->UserChat->user_id_tujuan);
        return new PrivateChannel('privatechat');
    }
}
