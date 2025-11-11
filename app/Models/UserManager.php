<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserManager extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'manager';

    protected $table = 'users_managers';

    protected $guarded = [];

    protected $hidden = ['password', 'remember_token'];

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
