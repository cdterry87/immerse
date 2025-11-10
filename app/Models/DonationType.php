<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationType extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'donation_types';

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}
