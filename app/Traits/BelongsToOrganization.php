<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait BelongsToOrganization
{
    public function scopeForManager(Builder $query): Builder
    {
        $user = auth('manager')->user();

        return $query->when($user, fn($query) => $query->where('organization_id', $user->organization_id))
            ->when(!$user, fn($query) => $query->whereNull('organization_id'));
    }
}
