<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name'];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function companys()
    {
        return $this->belongsToMany(Company::class, 'company_city');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
