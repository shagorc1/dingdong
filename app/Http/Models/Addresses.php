<?php

namespace App\Models;

use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{
    protected $fillable = ['street', 'number', 'colony', 'cp', 'geolocation', 'user_id', 'state_id', 'municipality_id'];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ActiveScope);
    }
}