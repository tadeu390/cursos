<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name'];

    public function localization()
    {
        return $this->hasOne(Localization::class, 'country_id', 'id');
    }

    public function states()
    {
        return $this->hasMany(State::class);
    }

    public function cities()
    {                                               //state entidade intermediadora
        return $this->hasManyThrough(City::class, State::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
