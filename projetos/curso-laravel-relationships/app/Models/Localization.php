<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Localization extends Model
{
    protected $fillable = ['latitude', 'longitude', 'country_id'];

    public function country()
    {                                             //chave estranageira em localization e chave primaria de country
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
}
