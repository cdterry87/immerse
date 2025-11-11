<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'donations';

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function type()
    {
        return $this->belongsTo(DonationType::class, 'donation_type_id');
    }

    public function member()
    {
        return $this->belongsTo(UsersMember::class, 'user_member_id');
    }
}
