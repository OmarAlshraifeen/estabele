<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stable extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'location', 'admin_id'];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
