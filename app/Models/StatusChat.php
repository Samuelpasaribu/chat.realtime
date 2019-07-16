<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusChat extends Model
{
    protected $fillable = [
        'id', 'user_id_tujuan', 'user_id', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function usertujuan()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id_tujuan');
    }
}
