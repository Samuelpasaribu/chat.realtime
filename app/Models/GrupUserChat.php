<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Grup;

class GrupUserChat extends Model
{
    protected $fillable = [
        'id', 'chat', 'grub_id', 'user_id'
    ];

    public function grup()
    {
        return $this->belongsTo(\App\Models\Grup::class, 'grub_id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
