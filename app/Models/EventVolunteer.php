<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventVolunteer extends Model
{
    protected $guarded = [];

    protected $table = 'events_volunteers';

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function volunteer()
    {
        return $this->belongsTo(UserVolunteer::class, 'user_volunteer_id');
    }
}
