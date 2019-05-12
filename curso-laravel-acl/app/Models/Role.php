<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'label',
    ];

    public function permissions()
    {
        return $this->belongsToMany(\App\Models\Permission::class);
    }

    public function usuarios()
    {
        return $this->belongsToMany(\App\Models\User::class);
    }
}
