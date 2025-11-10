<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVolunteerUnavailableDate extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'users_volunteers_unavailable_dates';

    public function volunteer()
    {
        return $this->belongsTo(UsersVolunteer::class, 'user_volunteer_id');
    }
}
