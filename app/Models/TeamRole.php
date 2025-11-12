<?php

namespace App\Models;

use App\Traits\BelongsToOrganization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeamRole extends Model
{
    use HasFactory, BelongsToOrganization;

    protected $guarded = [];

    protected $table = 'teams_roles';

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function volunteers()
    {
        return $this->belongsToMany(UsersVolunteer::class, 'teams_volunteers', 'team_role_id', 'user_volunteer_id');
    }
}
