<?php

namespace App\Models;

use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Model;

class Municipalities extends Model
{
    protected $fillable = ['name', 'state_id'];

    public function state () {
        return $this->hasOne(States::class, 'id', 'state_id');
    }

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ActiveScope);
    }
}
