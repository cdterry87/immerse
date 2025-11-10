<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamRole extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'teams_roles';

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function volunteers()
    {
        return $this->belongsToMany(UsersVolunteer::class, 'teams_volunteers', 'team_role_id', 'user_volunteer_id');
    }
}
