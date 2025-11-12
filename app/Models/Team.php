<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use App\Traits\BelongsToOrganization;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model implements HasMedia
{
    use InteractsWithMedia, BelongsToOrganization;
    use HasFactory;

    protected $guarded = [];

    protected $table = 'teams';

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
        return $this->belongsToMany(UsersVolunteer::class, 'teams_volunteers', 'team_id', 'user_volunteer_id')
            ->withPivot('team_role_id');
    }

    public function roles()
    {
        return $this->belongsToMany(TeamRole::class, 'teams_volunteers', 'team_id', 'team_role_id');
    }
}
