<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UsersMember extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'member';

    protected $guarded = [];

    protected $hidden = ['password', 'remember_token'];

    public function organizations()
    {
        return $this->belongsToMany(Organization::class, 'organizations_members');
    }

    public function donations()
    {
        return $this->hasMany(Donation::class, 'user_member_id');
    }

    public function events()
    {
        return $this->belongsToMany(Event::class, 'events_members', 'user_member_id', 'event_id');
    }
}
