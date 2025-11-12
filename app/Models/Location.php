<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use App\Traits\BelongsToOrganization;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    use BelongsToOrganization;

    protected $guarded = [];

    protected $table = 'locations';

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function getCustomPathSegment(): string
    {
        return "organizations/{$this->organization->uuid}/locations/{$this->uuid}";
    }
}
