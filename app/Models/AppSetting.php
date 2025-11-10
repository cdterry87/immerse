<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'app_settings';

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
