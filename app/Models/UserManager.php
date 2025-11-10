<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UsersManager extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'manager';

    protected $guarded = [];

    protected $hidden = ['password', 'remember_token'];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
