<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventMember extends Model
{
    protected $guarded = [];

    protected $table = 'events_members';

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function member()
    {
        return $this->belongsTo(UserMember::class, 'user_member_id');
    }
}
