<?php

namespace App\Events;

use App\Models\GrupUserChat;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class GrupEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $GrupUserChat;
    public $user;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($GrupUserChat)
    {
        $this->GrupUserChat = $GrupUserChat;
        // $this->user = $user;
    }

    public function broadcastWith()
    {
        $this->GrupUserChat->load('user');

        // return ['grupUser' => $this->grupUser->toArray()];

        return [
            'chat' => $this->GrupUserChat->chat,
            'created_at' => $this->GrupUserChat->created_at,
            'user' => [
                'name' => $this->GrupUserChat->user->name
            ]
            
        ];
            // 'chat' : this.body.trim(),
            // 'created_at' : moment().utc(0).format('YYYY-MM-DD HH:mm:ss'),
            // 'user' : {
            //     'name' : Laravel.user.name
            // }
        // );
    }

    // public function broadcastAs()
    // {
    //     return 'newMessage';
    // }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // return new PrivateChannel('grup.'.$this->grupUser->grub_id);
        return new PrivateChannel('grup.'.$this->GrupUserChat->grub_id);
        // return new PrivateChannel('grup.8');
        // return new PrivateChannel('grup-chat.8');
    }
}
