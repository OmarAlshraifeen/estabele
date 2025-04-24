<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // حتى نقدر نستخدمه في login مستقبلاً
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password'];
}
