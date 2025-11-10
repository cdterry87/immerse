<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeamVolunteer extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'teams_volunteers';

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function volunteer()
    {
        return $this->belongsTo(UserVolunteer::class, 'user_volunteer_id');
    }
}
