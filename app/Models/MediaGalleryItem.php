<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class MediaGalleryItem extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    protected $table = 'media_gallery_items';

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function gallery()
    {
        return $this->belongsTo(MediaGallery::class, 'media_gallery_id');
    }
}
