<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Path extends Model
{
    protected $fillable = ['name', 'duration_minutes', 'price', 'description', 'stable_id'];

    public function stable()
    {
        return $this->belongsTo(Stable::class);
    }
}
