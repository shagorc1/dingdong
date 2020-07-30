<?php

namespace App\Models;

use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Model;

class UsersPlans extends Model
{
    protected $fillable = ['user_id', 'plan_id', 'date_hire'];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ActiveScope);
    }
}
