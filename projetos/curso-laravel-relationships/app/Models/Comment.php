<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fiilable = [
        'description',
    ];

    public function commentable()
    {
        return $this->morphTo();
    }
}
