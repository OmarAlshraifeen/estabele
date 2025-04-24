<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horse extends Model
{
    protected $fillable = ['name', 'type', 'stable_id'];

    public function stable()
    {
        return $this->belongsTo(Stable::class);
    }
}
