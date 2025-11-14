<?php

namespace App\Models;

use App\Traits\BelongsToOrganization;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserManager extends Authenticatable
{
    use HasRoles;
    use BelongsToOrganization;
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
