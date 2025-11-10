<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function volunteers()
    {
        return $this->belongsToMany(UsersVolunteer::class, 'events_volunteers', 'event_id', 'user_volunteer_id')
            ->withPivot('accepted');
    }

    public function members()
    {
        return $this->belongsToMany(UsersMember::class, 'events_members', 'event_id', 'user_member_id');
    }
}
