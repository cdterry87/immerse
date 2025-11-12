<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Organization extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    protected $table = 'organizations';

    public function managers()
    {
        return $this->hasMany(UserManager::class);
    }

    public function staffMembers()
    {
        return $this->hasMany(StaffMember::class);
    }

    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public function mediaSeries()
    {
        return $this->hasMany(MediaSeries::class);
    }

    public function mediaGalleries()
    {
        return $this->hasMany(MediaGallery::class);
    }

    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    public function teamRoles()
    {
        return $this->hasMany(TeamRole::class);
    }

    public function donationTypes()
    {
        return $this->hasMany(DonationType::class);
    }

    public function members()
    {
        return $this->belongsToMany(UserMember::class, 'organizations_members');
    }

    public function volunteers()
    {
        return $this->belongsToMany(UserVolunteer::class, 'organizations_volunteers');
    }

    public function websiteSettings()
    {
        return $this->hasMany(WebsiteSetting::class);
    }

    public function appSettings()
    {
        return $this->hasMany(AppSetting::class);
    }

    public function getCustomPathSegment(): string
    {
        return "organizations/{$this->uuid}/images";
    }
}
