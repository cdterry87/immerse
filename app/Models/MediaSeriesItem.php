<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class MediaSeriesItem extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    protected $table = 'media_series_items';

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function mediaSeries()
    {
        return $this->belongsTo(MediaSeries::class);
    }
}
