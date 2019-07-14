<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrupChatUser extends Model
{
    protected $fillable = [
        'id'
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
