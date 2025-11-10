<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersVolunteerUnavailableDate extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function volunteer()
    {
        return $this->belongsTo(UsersVolunteer::class, 'user_volunteer_id');
    }
}
