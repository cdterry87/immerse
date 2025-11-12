<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use App\Traits\BelongsToOrganization;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MediaSeries extends Model implements HasMedia
{
    use HasFactory, BelongsToOrganization, InteractsWithMedia;

    protected $guarded = [];

    protected $table = 'media_series';

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function items()
    {
        return $this->hasMany(MediaSeriesItem::class);
    }
}
