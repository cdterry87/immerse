<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UsersVolunteer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'volunteer';

    protected $guarded = [];

    protected $hidden = ['password', 'remember_token'];

    public function organizations()
    {
        return $this->belongsToMany(Organization::class, 'organizations_volunteers');
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'teams_volunteers', 'user_volunteer_id', 'team_id')
            ->withPivot('team_role_id');
    }

    public function teamRoles()
    {
        return $this->belongsToMany(TeamRole::class, 'teams_volunteers', 'user_volunteer_id', 'team_role_id');
    }

    public function events()
    {
        return $this->belongsToMany(Event::class, 'events_volunteers', 'user_volunteer_id', 'event_id')
            ->withPivot('accepted');
    }

    public function unavailableDates()
    {
        return $this->hasMany(UsersVolunteerUnavailableDate::class, 'user_volunteer_id');
    }
}
