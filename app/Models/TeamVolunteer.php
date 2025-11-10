<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamVolunteer extends Model
{
    protected $guarded = [];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function volunteer()
    {
        return $this->belongsTo(UserVolunteer::class, 'user_volunteer_id');
    }
}
