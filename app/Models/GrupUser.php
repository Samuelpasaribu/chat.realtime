<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrupUser extends Model
{
    protected $fillable = [
        'grub_id', 'user_id',
    ];

    public function grup()
    {
        return $this->belongsTo(\App\Models\Grup::class, 'grub_id');
    }
}
