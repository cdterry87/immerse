<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserAdministrator extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'administrator';

    protected $table = 'users_administrators';

    protected $guarded = [];

    protected $hidden = ['password', 'remember_token'];
}
