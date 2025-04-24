<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'horse_id',
        'path_id',
        'start_time',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function horse()
    {
        return $this->belongsTo(Horse::class);
    }

    public function path()
    {
        return $this->belongsTo(Path::class);
    }
}
