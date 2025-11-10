<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrganizationVolunteer extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'organizations_volunteers';

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function volunteer()
    {
        return $this->belongsTo(UserVolunteer::class, 'user_volunteer_id');
    }
}
