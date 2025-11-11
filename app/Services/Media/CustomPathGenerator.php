<?php

namespace App\Services\Media;

use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CustomPathGenerator implements PathGenerator
{
    public function getPath(Media $media): string
    {
        $model = $media->model;
        $basePath = 'organization';

        if (method_exists($model, 'getCustomPathSegment')) {
            $basePath = $model->getCustomPathSegment();
        }

        return "{$basePath}/{$media->collection_name}/{$media->uuid}/";
    }

    public function getPathForConversions(Media $media): string
    {
        return $this->getPath($media) . 'conversions/';
    }

    public function getPathForResponsiveImages(Media $media): string
    {
        return $this->getPath($media) . 'responsive-images/';
    }
}
