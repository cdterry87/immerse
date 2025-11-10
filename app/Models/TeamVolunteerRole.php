<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeamVolunteerRole extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'teams_volunteers_roles';

    public function volunteer()
    {
        return $this->belongsTo(TeamVolunteer::class, 'team_volunteer_id');
    }

    public function role()
    {
        return $this->belongsTo(TeamRole::class, 'team_role_id');
    }
}
