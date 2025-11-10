<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrganizationMember extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'organizations_members';

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function member()
    {
        return $this->belongsTo(UserMember::class, 'user_member_id');
    }
}
