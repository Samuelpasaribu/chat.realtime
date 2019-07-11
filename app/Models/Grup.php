<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grup extends Model
{
    protected $fillable = [
        'nama_grup', 'deskripsi', 'user_id',
    ];
}
