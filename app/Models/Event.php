<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use App\Traits\BelongsToOrganization;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model implements HasMedia
{
    use InteractsWithMedia, BelongsToOrganization;
    use HasFactory;

    protected $guarded = [];

    protected $table = 'events';

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

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
