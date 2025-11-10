<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationVolunteer extends Model
{
    protected $guarded = [];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function volunteer()
    {
        return $this->belongsTo(UserVolunteer::class, 'user_volunteer_id');
    }
}
