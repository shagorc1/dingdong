<?php

namespace App\Models;

use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $fillable = ['name', 'address', 'geolocation', 'description'];

    public function category () {
        return $this->hasOne(Categories::class, 'id', 'category_id');
    }

    public function municipality () {
        return $this->hasOne(Municipalities::class, 'id', 'municipality_id');
    }

    public function user () {
        return $this->hasOne(Users::class, 'id', 'user_id');
    }

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ActiveScope);
    }
}
